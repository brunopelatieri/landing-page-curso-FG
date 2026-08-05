<?php
/**
 * obrigado.php — Página de confirmação pós-compra
 * Pilates Aéreo Fuzari e Goulart
 */

// Segurança básica: só acessar se vier do checkout (ou via parâmetro assinado)
// Em produção, idealmente validar via sessão ou token único enviado pelo checkout.php
$paymentId = isset($_GET['pid']) ? htmlspecialchars($_GET['pid'], ENT_QUOTES, 'UTF-8') : '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscrição confirmada — Pilates Aéreo Fuzari e Goulart</title>
  <meta name="robots" content="noindex, nofollow">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@600;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary:        '#6B1928',
            'primary-dark': '#4E1020',
            accent:         '#4A6741',
            bg:             '#FAF6F0',
            surface:        '#F3ECE3',
            'text-main':    '#1A1210',
            'text-muted':   '#6B5B52',
            border:         '#DDD3C8',
          },
          fontFamily: {
            display: ['Fraunces', 'Georgia', 'serif'],
            body:    ['DM Sans', 'system-ui', 'sans-serif'],
          },
        }
      }
    }
  </script>

  <!-- META PIXEL — Evento Purchase -->
  <!--
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', 'SEU_PIXEL_ID_AQUI');
    fbq('track', 'PageView');
    fbq('track', 'Purchase', {
      value: 949.00,
      currency: 'BRL',
      content_name: 'Curso Pilates Aéreo Fuzari e Goulart',
      content_type: 'product',
    });
  </script>
  <noscript>
    <img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=SEU_PIXEL_ID_AQUI&ev=Purchase&noscript=1"/>
  </noscript>
  -->

  <!-- GA4 — Evento purchase -->
  <!--
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-XXXXXXXXXX');
    gtag('event', 'purchase', {
      transaction_id: '<?= $paymentId ?>',
      value: 949.00,
      currency: 'BRL',
      items: [{
        item_id: 'pilates-aereo-fg',
        item_name: 'Curso Pilates Aéreo Fuzari e Goulart',
        price: 949.00,
        quantity: 1,
      }]
    });
  </script>
  -->

  <style>
    body { font-family: 'DM Sans', system-ui, sans-serif; }
    h1, h2, .font-display { font-family: 'Fraunces', Georgia, serif; }

    @keyframes checkmark {
      0%   { stroke-dashoffset: 100; opacity: 0; }
      60%  { opacity: 1; }
      100% { stroke-dashoffset: 0; opacity: 1; }
    }
    .checkmark-circle { animation: checkmark 0.8s ease forwards; }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp 0.6s ease forwards; }
    .fade-up-delay-1 { animation-delay: 0.3s; opacity: 0; }
    .fade-up-delay-2 { animation-delay: 0.6s; opacity: 0; }
    .fade-up-delay-3 { animation-delay: 0.9s; opacity: 0; }
  </style>
</head>
<body class="bg-bg text-text-main antialiased min-h-screen flex flex-col">

  <!-- Header mínimo -->
  <header class="bg-white border-b border-border py-4 px-6 text-center">
    <p class="font-display font-bold text-primary text-lg">Clínica Fuzari Goulart</p>
  </header>

  <!-- Conteúdo principal -->
  <main class="flex-1 flex items-center justify-center py-16 px-4">
    <div class="max-w-2xl w-full text-center">

      <!-- Ícone de sucesso animado -->
      <div class="flex justify-center mb-8">
        <div class="w-24 h-24 rounded-full bg-green-100 flex items-center justify-center shadow-lg">
          <svg viewBox="0 0 52 52" class="w-14 h-14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="26" cy="26" r="25" stroke="#4A6741" stroke-width="2" fill="#f0fdf4"/>
            <polyline
              points="14,26 22,34 38,18"
              stroke="#4A6741"
              stroke-width="3.5"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-dasharray="100"
              class="checkmark-circle"
            />
          </svg>
        </div>
      </div>

      <!-- Título -->
      <h1 class="font-display text-4xl md:text-5xl font-bold text-text-main mb-4 fade-up">
        Sua inscrição está confirmada! 🎉
      </h1>

      <p class="text-text-muted text-lg leading-relaxed mb-10 fade-up fade-up-delay-1 max-w-xl mx-auto">
        Bem-vindo(a) ao Curso Pilates Aéreo Fuzari e Goulart. Estamos muito felizes em ter você nessa jornada de transformação clínica.
      </p>

      <!-- Próximos passos -->
      <div class="bg-surface border border-border rounded-2xl p-6 md:p-8 text-left mb-8 fade-up fade-up-delay-2 shadow-sm">
        <h2 class="font-display text-xl font-bold text-text-main mb-5">Seus próximos passos:</h2>

        <div class="space-y-4">
          <div class="flex gap-4 items-start">
            <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm flex-shrink-0 mt-0.5">1</div>
            <div>
              <p class="font-semibold text-text-main">Verifique seu e-mail</p>
              <p class="text-text-muted text-sm mt-0.5">
                Você receberá os dados de acesso em até <strong>60</strong> minutos.
                Caso não encontre, verifique a pasta de spam ou promoções.
              </p>
            </div>
          </div>

          <div class="flex gap-4 items-start">
            <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm flex-shrink-0 mt-0.5">2</div>
            <div>
              <p class="font-semibold text-text-main">Entre no grupo exclusivo de alunos</p>
              <p class="text-text-muted text-sm mt-0.5">
                Nosso grupo no WhatsApp é onde você recebe avisos, tira dúvidas e conecta com outros profissionais.
              </p>
            </div>
          </div>

          <div class="flex gap-4 items-start">
            <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm flex-shrink-0 mt-0.5">3</div>
            <div>
              <p class="font-semibold text-text-main">Separe sua agenda para o curso</p>
              <p class="text-text-muted text-sm mt-0.5">
                {{PREENCHER — informar data, horário e local/link de acesso do curso}}
              </p>
            </div>
          </div>

          <div class="flex gap-4 items-start">
            <div class="w-8 h-8 rounded-full bg-accent text-white flex items-center justify-center font-bold text-sm flex-shrink-0 mt-0.5">✓</div>
            <div>
              <p class="font-semibold text-text-main">Sua apostila exclusiva</p>
              <p class="text-text-muted text-sm mt-0.5">
                {{PREENCHER — informar quando e como a apostila impressa será enviada/entregue}}
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Botão WhatsApp -->
      <div class="fade-up fade-up-delay-3">
        <a
          href="https://wa.me/5519992758914"
          target="_blank"
          rel="noopener noreferrer"
          class="inline-flex items-center gap-3 bg-green-500 hover:bg-green-600 text-white font-bold text-base px-8 py-4 rounded-xl shadow-lg hover:shadow-xl transition-all hover:-translate-y-1"
        >
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="22" height="22" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
          </svg>
          Entrar no grupo WhatsApp →
        </a>

        <p class="text-text-muted text-sm mt-4">
          Dúvidas? Fale com nossa equipe: <a href="https://wa.me/5519992758914" class="text-primary font-semibold hover:underline">(19) 99275-8914</a>
        </p>
      </div>

    </div>
  </main>

  <!-- Rodapé mínimo -->
  <footer class="bg-[#1A1210] text-white/50 text-center py-6 text-xs">
    <p>© 2025 Clínica Fuzari Goulart · CNPJ: 16.565.456/0001-39</p>
  </footer>

</body>
</html>
