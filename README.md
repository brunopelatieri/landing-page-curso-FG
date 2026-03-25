# Landing Page — Pilates Aéreo Fuzari e Goulart

Página de vendas de alta conversão para o Curso Pilates Aéreo Fuzari e Goulart,
com checkout transparente Mercado Pago (PIX + Cartão de Crédito).

**Stack:** PHP 8.2 · Tailwind CSS CDN · Lucide Icons · Mercado Pago SDK PHP · JS Vanilla

---

## Guia de Deploy — Hostinger (7 passos)

### Passo 1 — Subir os arquivos para o servidor

**Via FTP (FileZilla ou similar):**
1. Conecte ao servidor Hostinger com as credenciais FTP do painel
2. Acesse a pasta raiz do domínio (normalmente `public_html/`)
3. Envie **todos os arquivos** do projeto, mantendo a estrutura de pastas:

```
public_html/
├── .htaccess
├── index.php
├── checkout.php
├── obrigado.php
├── composer.json
├── public/
│   ├── images/        ← todas as imagens .webp
│   └── js/
│       └── app.js
└── vendor/            ← gerado pelo Composer no Passo 2
```

**Via Git (recomendado):**
```bash
git init
git remote add origin https://github.com/{{PREENCHER_USUARIO}}/{{PREENCHER_REPO}}.git
git push -u origin main
```
Em seguida, acesse o terminal SSH do Hostinger e faça `git pull`.

---

### Passo 2 — Instalar dependências com Composer

Acesse o terminal SSH do Hostinger (painel → Avançado → Terminal SSH) e execute:

```bash
cd public_html/
composer install --no-dev --optimize-autoloader
```

Isso criará a pasta `vendor/` com o SDK do Mercado Pago.

> **PHP 8.2 na Hostinger:** confirme no painel em *Hospedagem → PHP → Versão do PHP* que está em 8.2+.

---

### Passo 3 — Inserir credenciais do Mercado Pago

Abra `checkout.php` e substitua as duas constantes no topo do arquivo:

```php
define('MP_ACCESS_TOKEN', '{{MP_ACCESS_TOKEN}}');   // linha ~46
define('MP_PUBLIC_KEY',   '{{MP_PUBLIC_KEY}}');      // linha ~47
```

**Onde obter as credenciais:**
1. Acesse o [Painel do Mercado Pago](https://www.mercadopago.com.br/developers/pt/docs/credentials)
2. Vá em *Desenvolvimento → Credenciais*
3. Para testes: use as credenciais de **Sandbox**
4. Para produção: use as credenciais de **Produção**

> Também substitua `{{PREENCHER_URL_DOMINIO}}/webhook.php` pela URL real do seu domínio
> nos dois campos `notification_url` dentro de `checkout.php`.

---

### Passo 4 — Inserir Pixel Meta e GA4 em `index.php`

Localize os blocos comentados no `<head>` de `index.php`:

**Meta Pixel** (linha ~54 em `index.php`):
```html
<!-- META PIXEL: colar aqui -->
```
Descomente o bloco e substitua `SEU_PIXEL_ID_AQUI` pelo ID do seu Pixel.

**GA4** (linha ~75 em `index.php`):
```html
<!-- GA4: colar aqui -->
```
Descomente o bloco e substitua `G-XXXXXXXXXX` pelo ID da sua propriedade GA4.

Repita o mesmo processo em `obrigado.php` para disparar os eventos de conversão
(`Purchase` no Meta e `purchase` no GA4).

---

### Passo 5 — Substituir todos os `{{PREENCHER}}`

Localize e substitua cada marcador abaixo. Use **Localizar e Substituir** no editor ou
`grep -rn "{{PREENCHER" .` no terminal.

#### `index.php`

| Marcador | Localização (seção) | O que inserir |
|---|---|---|
| `{{PREENCHER_URL_DOMINIO}}` | `<head>` — canonical + og:url + og:image | URL do seu domínio sem barra final. Ex: `https://pilatesaerofg.com.br` |
| `{{PREENCHER}}` — vagas restantes (urgência) | Seção 0 — barra sticky | Número de vagas disponíveis. Ex: `12` |
| `{{PREENCHER_DATA_ALVO_ISO8601}}` | Seção 0 — `data-target` countdown | Data/hora no formato ISO 8601. Ex: `2025-12-31T23:59:59-03:00` |
| `{{PREENCHER}}` — profissionais formados (badge hero) | Seção 1 — Hero | Número de alunos. Ex: `200` |
| `{{PREENCHER}}` — 4 métricas | Seção 1.5 — Prova social | Profissionais formados, anos de exp., avaliação, clínicas parceiras |
| `{{PREENCHER}}` — Nome Sócia 1 | Seção 6 — Quem somos | Nome completo da sócia 1 |
| `{{PREENCHER}}` — Formação Sócia 1 | Seção 6 — Quem somos | Ex: `Fisioterapeuta · CREFITO 12345-F` |
| `{{PREENCHER}}` — Bio Sócia 1 | Seção 6 — Quem somos | Texto de apresentação profissional |
| `{{INSERIR SE APLICÁVEL — CREFITO / CREF}}` × 2 | Seção 6 — Quem somos | Registro profissional ou remover a linha |
| `{{PREENCHER}}` — Nome Sócia 2 | Seção 6 — Quem somos | Nome completo da sócia 2 |
| `{{PREENCHER}}` — Formação Sócia 2 | Seção 6 — Quem somos | Ex: `Profissional de Ed. Física · CREF 12345-G/SP` |
| `{{PREENCHER}}` — Bio Sócia 2 | Seção 6 — Quem somos | Texto de apresentação profissional |
| `{{PREENCHER}}` — Citação missão | Seção 6 — Quem somos | Frase ou missão das fundadoras |
| `{{PREENCHER}}` — até (badge oferta) | Seção 7 — Oferta | Data limite da oferta. Ex: `31/12/2025` |
| `{{PREENCHER}}` — preço riscado | Seção 7 — Oferta | Preço original. Ex: `R$ 1.497,00` |
| `{{PREENCHER}}` — pessoas vendo + vagas | Seção 7 — Oferta | Ex: `47` e `8` |
| `{{PREENCHER}}` — tabela de valor (6 itens) | Seção 5 — Bônus | Valores percebidos de cada item. Ex: `R$ 197,00` |
| `{{PREENCHER}}` — valor total riscado | Seção 5 — Bônus | Soma de todos os itens. Ex: `R$ 2.594,00` |
| `{{PREENCHER}}` — Bônus 1 | Seção 5 — Bônus | Nome do bônus 1 |
| `{{PREENCHER}}` — Bônus 2 | Seção 5 — Bônus | Nome do bônus 2 |
| `{{DEPOIMENTO_1}}`, `{{DEPOIMENTO_2}}`, `{{DEPOIMENTO_3}}` | Seção 4 — Depoimentos | Textos dos depoimentos reais |
| `{{PREENCHER}}` × 6 (nome/formação/inicial dos cards) | Seção 4 — Depoimentos | Nome, formação e inicial do avatar de cada depoente |
| `{{RESPOSTA_FAQ_1}}` … `{{RESPOSTA_FAQ_6}}` | Seção 8 — FAQ | Respostas das 6 perguntas frequentes |
| `{{PREENCHER}}` — horas modal exit | Modal exit intent | Ex: `48` |
| `{{PREENCHER_URL_POLITICA_PRIVACIDADE}}` | Rodapé | URL da página de política |
| `{{PREENCHER_URL_TERMOS_DE_USO}}` | Rodapé | URL da página de termos |
| `{{PREENCHER}}` — CNPJ | Rodapé | CNPJ da Clínica Fuzari Goulart |

#### `checkout.php`

| Marcador | Localização | O que inserir |
|---|---|---|
| `{{MP_ACCESS_TOKEN}}` | linha ~46 | Access Token do painel Mercado Pago |
| `{{MP_PUBLIC_KEY}}` | linha ~47 | Public Key do painel Mercado Pago |
| `{{PREENCHER_URL_DOMINIO}}` × 2 | `notification_url` PIX e Cartão | URL do domínio. Ex: `https://pilatesaerofg.com.br` |
| `{{PREENCHER_DOMINIO}}` | comentário PHPMailer | Domínio do e-mail remetente. Ex: `pilatesaerofg.com.br` |

#### `obrigado.php`

| Marcador | Localização | O que inserir |
|---|---|---|
| `{{PREENCHER}}` — minutos e-mail | Passo 1 — próximos passos | Ex: `10` minutos |
| `{{PREENCHER}}` — data/local curso | Passo 3 — agenda | Data, horário e local ou link de acesso |
| `{{PREENCHER}}` — apostila | Passo 4 — apostila | Quando e como a apostila será entregue |
| `{{PREENCHER_LINK_GRUPO_WHATSAPP}}` | Botão WhatsApp | Link do grupo. Ex: `https://chat.whatsapp.com/XXXXXX` |
| `{{PREENCHER}}` — CNPJ | Rodapé | CNPJ da clínica |

#### `public/js/app.js`

| Marcador | Localização | O que inserir |
|---|---|---|
| `{{PREENCHER_DATA_ALVO_ISO8601}}` | Já referenciado via `data-target` no HTML | Configurar em `index.php` (ver acima) |

---

### Passo 6 — Testar com cartão sandbox do Mercado Pago

1. No painel do MP, ative o modo **Sandbox** e copie as credenciais de teste
2. Cole as credenciais de Sandbox em `checkout.php` (linha ~46–47)
3. Use os [cartões de teste oficiais](https://www.mercadopago.com.br/developers/pt/docs/your-integrations/test/cards):

| Cenário | Número | Validade | CVV | Nome |
|---|---|---|---|---|
| Aprovado | `5031 4332 1540 6351` | qualquer futura | `123` | `APRO` |
| Recusado | `5031 4332 1540 6351` | qualquer futura | `123` | `OTHE` |
| Pendente | `5031 4332 1540 6351` | qualquer futura | `123` | `CONT` |

4. Para PIX em sandbox, o QR Code é gerado mas não é possível pagar de verdade —
   verifique se os campos `qr_code` e `qr_code_base64` retornam no JSON
5. Confirme os logs em `logs/pagamentos.log`
6. Verifique o painel MP > Atividades para confirmar os pagamentos de teste

---

### Passo 7 — Ativar SSL na Hostinger

O Mercado Pago **exige HTTPS** para processar pagamentos. Para garantir:

1. Acesse o painel Hostinger → **Hospedagem → Segurança → SSL**
2. Verifique se o certificado Let's Encrypt está ativo (renovação automática a cada 90 dias)
3. Se não estiver ativo: clique em **Instalar SSL** → selecione o domínio → confirme
4. Aguarde até 10 minutos para propagação
5. Teste acessando `https://seudominio.com.br` — deve carregar sem aviso de segurança
6. O `.htaccess` já redireciona automaticamente HTTP → HTTPS após o SSL estar ativo

---

## Estrutura de arquivos

```
landing-page-curso-FG/
├── .htaccess               ← Segurança, HTTPS redirect, cache, GZIP
├── index.php               ← Landing page completa (todas as seções)
├── checkout.php            ← Lógica PHP do Mercado Pago (PIX + Cartão)
├── obrigado.php            ← Confirmação pós-compra com eventos de conversão
├── composer.json           ← Dependências PHP (mercadopago/dx-php ^2.6)
├── vendor/                 ← Gerado por `composer install` (não versionar)
├── logs/
│   └── pagamentos.log      ← Gerado automaticamente (não versionar)
└── public/
    ├── images/
    │   ├── fuzari_goular_curso_pilates_aereo_1.webp   ← hero
    │   ├── fuzari_goulart_curso_pilates_aereo_2.webp  ← método
    │   ├── fuzari_goulart_curso_pilates_aereo_3.webp  ← método
    │   ├── fuzari_goulart_curso_pilates_aereo_4.webp  ← módulo básico
    │   ├── fuzari_goulart_curso_pilates_aereo_5.webp  ← quem somos
    │   ├── fuzari_goulart_curso_pilates_aereo_6.webp  ← módulo intermediário
    │   ├── fuzari_goulart_curso_pilates_aereo_7.webp  ← módulo avançado
    │   ├── fuzari_goulart_curso_pilates_aereo_9.webp  ← material exclusivo
    │   ├── fuzari_goulart_curso_pilates_aereo_10.webp ← material exclusivo
    │   └── fuzari_goulart_site_logo_maior.webp
    └── js/
        └── app.js          ← Todo o JavaScript (countdown, FAQ, tabs, etc.)
```

---

## Itens a não versionar (adicionar ao `.gitignore`)

```
/vendor/
/logs/
.env
*.log
```

---

## Suporte técnico

Dúvidas sobre o deploy? Entre em contato via WhatsApp: [(19) 99275-8914](https://wa.me/5519992758914)
