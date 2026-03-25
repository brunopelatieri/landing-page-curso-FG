<?php
/**
 * checkout.php — Pilates Aéreo Fuzari e Goulart
 * Processamento de pagamento via Mercado Pago SDK PHP
 *
 * Requer: composer require mercadopago/dx-php
 * Docs:   https://github.com/mercadopago/sdk-php
 */

declare(strict_types=1);

// ============================================================
// CONFIGURAÇÃO INICIAL
// ============================================================

require_once __DIR__ . '/vendor/autoload.php';

use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Exceptions\MPApiException;

// Apenas aceitar requisições POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit(json_encode(['status' => 'error', 'message' => 'Método não permitido.']));
}

// Cabeçalho JSON
header('Content-Type: application/json; charset=UTF-8');

// ============================================================
// CREDENCIAIS MERCADO PAGO
// INTEGRAÇÃO: substituir pelos tokens reais do painel MP
// https://www.mercadopago.com.br/developers/pt/docs/credentials
// ============================================================
define('MP_ACCESS_TOKEN', '{{MP_ACCESS_TOKEN}}');
define('MP_PUBLIC_KEY',   '{{MP_PUBLIC_KEY}}');
define('VALOR_PIX',       949.00);
define('VALOR_CARTAO',    999.00);
define('PARCELAS_MAX',    10);

MercadoPagoConfig::setAccessToken(MP_ACCESS_TOKEN);
MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL); // Trocar para ::SERVER em produção

// ============================================================
// UTILITÁRIOS
// ============================================================

/**
 * Sanitiza string: remove tags, espaços extras, encoding.
 */
function sanitizeStr(mixed $value): string
{
    if (!is_string($value)) return '';
    return trim(strip_tags(htmlspecialchars($value, ENT_QUOTES, 'UTF-8')));
}

/**
 * Remove tudo que não seja dígito.
 */
function onlyDigits(string $value): string
{
    return preg_replace('/\D/', '', $value);
}

/**
 * Valida e-mail.
 */
function isValidEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Valida CPF (algoritmo oficial).
 */
function isValidCpf(string $cpf): bool
{
    $digits = onlyDigits($cpf);

    if (strlen($digits) !== 11) return false;
    if (preg_match('/^(\d)\1{10}$/', $digits)) return false; // sequências iguais

    // Primeiro dígito verificador
    $sum = 0;
    for ($i = 0; $i < 9; $i++) {
        $sum += (int)$digits[$i] * (10 - $i);
    }
    $first = ($sum % 11 < 2) ? 0 : (11 - $sum % 11);
    if ((int)$digits[9] !== $first) return false;

    // Segundo dígito verificador
    $sum = 0;
    for ($i = 0; $i < 10; $i++) {
        $sum += (int)$digits[$i] * (11 - $i);
    }
    $second = ($sum % 11 < 2) ? 0 : (11 - $sum % 11);
    if ((int)$digits[10] !== $second) return false;

    return true;
}

/**
 * Valida telefone (mínimo 10 dígitos: DDD + número).
 */
function isValidPhone(string $phone): bool
{
    $digits = onlyDigits($phone);
    return strlen($digits) >= 10 && strlen($digits) <= 11;
}

/**
 * Registra em log de pagamentos (append seguro).
 */
function logPagamento(string $linha): void
{
    $logDir  = __DIR__ . '/logs';
    $logFile = $logDir . '/pagamentos.log';

    if (!is_dir($logDir)) {
        mkdir($logDir, 0750, true);
    }

    // Proteger o diretório de acesso direto
    $htaccess = $logDir . '/.htaccess';
    if (!file_exists($htaccess)) {
        file_put_contents($htaccess, "Deny from all\n");
    }

    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[{$timestamp}] {$linha}" . PHP_EOL, FILE_APPEND | LOCK_EX);
}

/**
 * Retorna JSON de erro e encerra execução.
 */
function errorResponse(string $message, int $httpCode = 400): never
{
    http_response_code($httpCode);
    echo json_encode(['status' => 'error', 'message' => $message]);
    exit;
}

// ============================================================
// COLETA E SANITIZAÇÃO DOS DADOS DO POST
// ============================================================

$nome          = sanitizeStr($_POST['nome']          ?? '');
$email         = sanitizeStr($_POST['email']         ?? '');
$cpfRaw        = sanitizeStr($_POST['cpf']           ?? '');
$telefoneRaw   = sanitizeStr($_POST['telefone']      ?? '');
$tipoPagamento = sanitizeStr($_POST['tipo_pagamento'] ?? 'pix');
$cardToken     = sanitizeStr($_POST['card_token']    ?? '');

$cpf      = onlyDigits($cpfRaw);
$telefone = onlyDigits($telefoneRaw);

// ============================================================
// VALIDAÇÃO SERVER-SIDE
// ============================================================

$errors = [];

if (empty($nome) || str_word_count($nome) < 2) {
    $errors[] = 'Nome completo é obrigatório (nome e sobrenome).';
}

if (!isValidEmail($email)) {
    $errors[] = 'E-mail inválido.';
}

if (!isValidCpf($cpf)) {
    $errors[] = 'CPF inválido.';
}

if (!isValidPhone($telefone)) {
    $errors[] = 'Telefone inválido. Informe DDD + número (10 ou 11 dígitos).';
}

if (!in_array($tipoPagamento, ['pix', 'cartao'], true)) {
    $errors[] = 'Tipo de pagamento inválido.';
}

if ($tipoPagamento === 'cartao' && empty($cardToken)) {
    $errors[] = 'Token do cartão ausente. Por favor, preencha os dados do cartão novamente.';
}

if (!empty($errors)) {
    errorResponse(implode(' ', $errors), 422);
}

// ============================================================
// IDENTIFICADOR ÚNICO DA TRANSAÇÃO (idempotência)
// ============================================================
$idempotencyKey = sprintf(
    '%s-%s-%s',
    onlyDigits($cpf),
    $tipoPagamento,
    bin2hex(random_bytes(8))
);

// ============================================================
// MONTAGEM DO PAYLOAD COMPARTILHADO
// ============================================================

$ddd    = substr($telefone, 0, 2);
$numero = substr($telefone, 2);

$payerData = [
    'email'         => $email,
    'first_name'    => explode(' ', $nome)[0],
    'last_name'     => implode(' ', array_slice(explode(' ', $nome), 1)),
    'identification' => [
        'type'   => 'CPF',
        'number' => $cpf,
    ],
    'phone' => [
        'area_code' => $ddd,
        'number'    => $numero,
    ],
];

// ============================================================
// PROCESSAMENTO POR TIPO DE PAGAMENTO
// ============================================================

try {
    $client = new PaymentClient();

    // ----------------------------------------------------------
    // PIX
    // ----------------------------------------------------------
    if ($tipoPagamento === 'pix') {

        $request = [
            'transaction_amount' => VALOR_PIX,
            'description'        => 'Curso Pilates Aéreo Fuzari e Goulart',
            'payment_method_id'  => 'pix',
            'payer'              => $payerData,
            'notification_url'   => 'https://{{PREENCHER_URL_DOMINIO}}/webhook.php',
            // INTEGRAÇÃO: ajustar URL do webhook antes de ir a produção
        ];

        $payment = $client->create($request, [
            'idempotencyKey' => $idempotencyKey,
        ]);

        $status = $payment->status;

        if ($status === 'pending') {
            $qrCode       = $payment->point_of_interaction->transaction_data->qr_code        ?? '';
            $qrCodeBase64 = $payment->point_of_interaction->transaction_data->qr_code_base64 ?? '';

            logPagamento(sprintf(
                'PIX PENDENTE | id=%s | email=%s | valor=R$%.2f | cpf=%s',
                $payment->id,
                $email,
                VALOR_PIX,
                $cpf
            ));

            echo json_encode([
                'status'         => 'pending',
                'payment_id'     => $payment->id,
                'qr_code'        => $qrCode,
                'qr_code_base64' => $qrCodeBase64,
                'message'        => 'QR Code PIX gerado. Escaneie para pagar.',
            ]);
            exit;
        }

        // Status inesperado do PIX
        errorResponse('Erro ao gerar PIX. Status: ' . $status, 502);
    }

    // ----------------------------------------------------------
    // CARTÃO DE CRÉDITO
    // ----------------------------------------------------------
    if ($tipoPagamento === 'cartao') {

        $parcelas = (int) ($_POST['installments'] ?? 1);
        $parcelas = max(1, min($parcelas, PARCELAS_MAX));

        $request = [
            'transaction_amount' => VALOR_CARTAO,
            'description'        => 'Curso Pilates Aéreo Fuzari e Goulart',
            'payment_method_id'  => sanitizeStr($_POST['payment_method_id'] ?? ''),
            // INTEGRAÇÃO: o payment_method_id (visa, master, elo, etc.) deve vir
            // do SDK JS do Mercado Pago após identificar a bandeira no frontend.
            'token'              => $cardToken,
            'installments'       => $parcelas,
            'payer'              => $payerData,
            'notification_url'   => 'https://{{PREENCHER_URL_DOMINIO}}/webhook.php',
        ];

        $payment = $client->create($request, [
            'idempotencyKey' => $idempotencyKey,
        ]);

        $status = $payment->status;

        if ($status === 'approved') {
            logPagamento(sprintf(
                'CARTÃO APROVADO | id=%s | email=%s | valor=R$%.2f | parcelas=%dx | cpf=%s',
                $payment->id,
                $email,
                VALOR_CARTAO,
                $parcelas,
                $cpf
            ));

            // INTEGRAÇÃO: inserir envio de e-mail de confirmação aqui.
            // Recomendado: PHPMailer ou Resend/SendGrid via cURL.
            // Exemplo com PHPMailer:
            //
            // use PHPMailer\PHPMailer\PHPMailer;
            // $mail = new PHPMailer(true);
            // $mail->setFrom('noreply@{{PREENCHER_DOMINIO}}', 'Clínica Fuzari Goulart');
            // $mail->addAddress($email, $nome);
            // $mail->Subject = 'Confirmação de inscrição — Pilates Aéreo Fuzari e Goulart';
            // $mail->Body    = '...'; // Template HTML
            // $mail->send();

            echo json_encode([
                'status'     => 'approved',
                'payment_id' => $payment->id,
                'message'    => 'Pagamento aprovado! Redirecionando...',
            ]);
            exit;
        }

        if ($status === 'in_process' || $status === 'pending') {
            logPagamento(sprintf(
                'CARTÃO PENDENTE | id=%s | email=%s | status=%s | cpf=%s',
                $payment->id,
                $email,
                $status,
                $cpf
            ));

            echo json_encode([
                'status'     => 'pending',
                'payment_id' => $payment->id,
                'message'    => 'Pagamento em análise. Você receberá a confirmação por e-mail.',
            ]);
            exit;
        }

        if ($status === 'rejected') {
            $detail = $payment->status_detail ?? 'unknown';

            $friendlyMessages = [
                'cc_rejected_insufficient_amount' => 'Saldo insuficiente no cartão. Tente outro cartão ou use o PIX.',
                'cc_rejected_bad_filled_security_code' => 'CVV incorreto. Verifique o código de segurança.',
                'cc_rejected_bad_filled_date'     => 'Data de validade incorreta.',
                'cc_rejected_bad_filled_other'    => 'Dados do cartão incorretos. Verifique e tente novamente.',
                'cc_rejected_call_for_authorize'  => 'Seu banco não autorizou a transação. Entre em contato com ele.',
                'cc_rejected_card_disabled'       => 'Cartão inativo. Entre em contato com seu banco.',
                'cc_rejected_duplicated_payment'  => 'Pagamento duplicado detectado. Aguarde alguns minutos.',
                'cc_rejected_high_risk'           => 'Transação recusada por segurança. Tente com PIX.',
            ];

            $msg = $friendlyMessages[$detail]
                ?? 'Pagamento recusado. Tente com outro cartão ou utilize o PIX.';

            logPagamento(sprintf(
                'CARTÃO RECUSADO | id=%s | email=%s | detail=%s | cpf=%s',
                $payment->id,
                $email,
                $detail,
                $cpf
            ));

            errorResponse($msg, 402);
        }

        errorResponse('Erro no processamento do cartão. Status: ' . $status, 502);
    }

} catch (MPApiException $e) {
    // Erros da API do Mercado Pago (autenticação, payload inválido, etc.)
    $apiStatus  = $e->getApiResponse()?->getStatusCode() ?? 0;
    $apiContent = $e->getApiResponse()?->getContent()    ?? [];

    logPagamento(sprintf(
        'ERRO API MP | http=%d | msg=%s | email=%s',
        $apiStatus,
        $e->getMessage(),
        $email
    ));

    // Não expor detalhes internos ao cliente
    errorResponse('Erro ao processar pagamento. Tente novamente em instantes.', 502);

} catch (Throwable $e) {
    // Qualquer outro erro inesperado
    logPagamento(sprintf(
        'ERRO INESPERADO | msg=%s | file=%s:%d | email=%s',
        $e->getMessage(),
        basename($e->getFile()),
        $e->getLine(),
        $email
    ));

    errorResponse('Erro interno. Nossa equipe foi notificada. Tente novamente.', 500);
}
