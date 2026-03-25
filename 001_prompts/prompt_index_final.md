# 👽 :25/03/2026 Prompt Incrementado e Refinado Claude LLM Sonnet 4.6

---

# PROMPT DE EXECUÇÃO — Cursor + Claude Sonnet 4.6
# Landing Page "Pilates Aéreo Fuzari e Goulart"
# Cole este arquivo inteiro no chat do Cursor e execute por etapas.
# -------------------------------------------------------------------
# INSTRUÇÃO DE EXECUÇÃO: Gere APENAS a etapa solicitada em cada mensagem.
# Não antecipe etapas futuras. Não resuma o que vai fazer. Apenas execute.
# -------------------------------------------------------------------

## CONTEXTO DO PROJETO

Você é um Desenvolvedor Web Sênior e Especialista em Copywriting para produtos educacionais
na área de saúde. Seu objetivo é gerar uma Landing Page de alta conversão em PHP para o curso
"Pilates Aéreo Fuzari e Goulart", vendido para Fisioterapeutas e Profissionais de Ed. Física.

**Stack:**
- PHP 8.2 (Hostinger)
- Tailwind CSS via CDN (sem build)
- Lucide Icons via CDN
- Checkout Transparente Mercado Pago (SDK PHP)
- JavaScript vanilla (sem jQuery, sem frameworks)

**Paleta de cores:** Baseada em fuzarigoulart.com.br — tons profissionais, elegantes.
Sugestão: bordô/vinho como cor primária de ação, offwhite/creme como fundo, verde-musgo como
acento. Ajustar ao inspecionar o site real.

**Imagens disponíveis em `public/images/`:**
- `fuzari_goular_curso_pilates_aereo_1.webp` → hero
- `fuzari_goulart_curso_pilates_aereo_2.webp` e `3.webp` → método
- `fuzari_goulart_curso_pilates_aereo_4.webp`, `6.webp`, `7.webp` → módulos básico/inter/avançado
- `fuzari_goulart_curso_pilates_aereo_5.webp` → quem somos
- `fuzari_goulart_curso_pilates_aereo_9.webp` e `10.webp` → material exclusivo

**Onde você ver {{PREENCHER}}: NÃO invente dados. Insira o marcador literalmente no código.**
O cliente vai substituir manualmente após receber o arquivo.

---

## ETAPA 1 — `index.php`: estrutura HTML completa + PHP inicial

Gere o arquivo `index.php` com:

### `<head>` completo:
```
- charset UTF-8, viewport mobile-first
- <title>Pilates Aéreo Fuzari e Goulart — Curso para Fisioterapeutas e Ed. Física</title>
- <meta name="description" content="Domine o Columpio e transforme sua prática clínica com
  o método mais completo de Pilates Aéreo terapêutico. Vagas limitadas.">
- Open Graph: og:title, og:description, og:image (usar imagem hero), og:url
- <link rel="preload"> para a imagem hero
- Tailwind CSS CDN
- Lucide Icons CDN
- Schema JSON-LD tipo "Course":
    name: "Pilates Aéreo Fuzari e Goulart"
    provider: "Clínica Fuzari Goulart"
    offers: { price: "949.00", priceCurrency: "BRL" }
    educationalLevel: "Professional"
- Bloco comentado para Pixel Meta: <!-- META PIXEL: colar aqui -->
- Bloco comentado para GA4: <!-- GA4: colar aqui -->
```

### Seção 0 — Barra de urgência (sticky, topo):
- Fundo cor primária, texto branco, bold
- Texto: `"⚡ Apenas {{PREENCHER}} vagas restantes — Inscrições encerram em {{PREENCHER}}"`
- Countdown `id="countdown"` com formato `00d 00h 00m 00s` (JS será adicionado na Etapa 2)
- Classe Tailwind `sticky top-0 z-50`

### Seção 1 — Hero:
- Background image: `fuzari_goular_curso_pilates_aereo_1.webp` com overlay escuro (opacity 60%)
- H1: `"Domine o Columpio e Transforme Sua Clínica com o Método de Reabilitação mais Completo
  do Pilates Aéreo"`
- Subheadline (parágrafo): `"Para fisioterapeutas e profissionais de Ed. Física que querem
  sair do protocolo genérico e oferecer resultados reais em mobilidade de cintura escapular,
  Power House e alinhamento corporal — com a segurança de quem aprendeu na fonte."`
- Botão CTA: `→ Garantir minha vaga com desconto` — âncora `#oferta` — mín. 52px altura mobile
- Micro-copy: `"🔒 Pagamento 100% seguro · Certificado incluso · Suporte por 3 meses"`
- 3 badges inline abaixo: `✓ Metodologia com apostila exclusiva` · `✓ +{{PREENCHER}} profissionais
  formados` · `✓ Clínica referência em Pilates Aéreo`

### Seção 1.5 — Barra de prova social:
- Fundo neutro (cinza claro), 4 métricas em grid 4 colunas desktop / 2x2 mobile:
  - `+{{PREENCHER}}` Profissionais formados
  - `+{{PREENCHER}}` Anos de experiência
  - `⭐ {{PREENCHER}}/5.0` Avaliação média
  - `{{PREENCHER}}` Clínicas parceiras
- Número grande bold, legenda pequena muted

### Seção 2 — Método (PAS):
- Imagens: `2.webp` e `3.webp` (layout 2 colunas com texto)
- Bloco PROBLEMA: copy sobre limitações dos protocolos convencionais para disfunções posturais
- Bloco AGITAÇÃO: consequências de não ter o método — perda de diferenciação clínica
- Bloco SOLUÇÃO: Método Fuzari Goulart com termos técnicos obrigatórios:
  `decúbito ventral`, `mobilidade de cintura escapular`, `alinhamento corporal`,
  `estabilização dinâmica`, `Power House`, `Columpio`
- CTA secundário (link âncora): `Ver o que você vai aprender →`

### Seção 3 — O que você vai aprender:
- Grid 3 colunas (md:grid-cols-3), 1 coluna no mobile
- Card Básico (imagem: `4.webp`): tópicos + `"Ao concluir: você conduzirá sessões básicas
  com segurança e protocolo definido."`
- Card Intermediário (imagem: `6.webp`): tópicos + `"Ao concluir: você aplicará sequências
  intermediárias adaptadas por disfunção."`
- Card Avançado (imagem: `7.webp`): tópicos + `"Ao concluir: você terá um método completo
  para diferenciação clínica imediata."`
- CTA âncora: `Quero me inscrever →`

### Seção 4 — Depoimentos:
- Grid 3 cards desktop / carrossel com swipe mobile (classes Tailwind + overflow-x-auto snap)
- Cada card: avatar placeholder, aspas, texto `"{{DEPOIMENTO_{{N}}}}"`, nome `{{PREENCHER}}`,
  formação `{{PREENCHER}}`, 5 estrelas
- Comentário HTML: `<!-- CLIENTE: substituir {{DEPOIMENTO_1}}, {{DEPOIMENTO_2}}, {{DEPOIMENTO_3}} -->`

### Seção 5 — Material exclusivo + Stack de bônus:
- Imagens: `9.webp` e `10.webp`
- Tabela de valor percebido:
  | Item | Valor |
  | Apostila Impressa exclusiva | {{PREENCHER}} |
  | Curso completo (vídeos) | {{PREENCHER}} |
  | Suporte 3 meses WhatsApp | {{PREENCHER}} |
  | Certificado de conclusão | {{PREENCHER}} |
  | Bônus 1: {{PREENCHER}} | {{PREENCHER}} |
  | Bônus 2: {{PREENCHER}} | {{PREENCHER}} |
  | **Valor total** (riscado) | **R$ {{PREENCHER}}** |
  | **Você paga hoje** | **R$ 949,00 no PIX** |

### Seção 6 — Quem somos:
- Imagem: `5.webp`
- Texto: Clínica Fuzari Goulart + apresentação de cada sócia com placeholders:
  nome, formação, anos de experiência, especialização, propósito
- Selos CREFITO/CREF: `{{INSERIR SE APLICÁVEL}}`

### Seção 7 — Oferta (`id="oferta"`):
- Card de destaque com:
  - Badge: `"⚡ OFERTA ESPECIAL — até {{PREENCHER}}"`
  - Preço riscado: `"De: R$ {{PREENCHER}}"`
  - Preço PIX em destaque máximo: `R$ 949,00`
  - Preço cartão: `R$ 999,00 · ou 10x de R$ 119,90`
  - Botão primário grande: `GARANTIR MINHA VAG AGORA`  — âncora `#checkout`
  - Selos de segurança: 🔒 SSL · Mercado Pago · Visa · Master · Elo
  - Bloco de garantia 7 dias: ícone escudo + texto
  - Micro-copy: `"{{PREENCHER}} pessoas estão vendo esta página agora · {{PREENCHER}} vagas restantes"`

### Seção 8 — FAQ accordion:
- 6 perguntas em accordion HTML/JS puro (sem biblioteca):
  1. "Preciso ter experiência prévia em Pilates?"
  2. "Consigo aplicar sem ter um Columpio próprio?"
  3. "O curso é presencial ou online?"
  4. "Recebo certificado reconhecido pelo CREFITO/CREF?"
  5. "E se não conseguir aplicar na minha clínica?"
  6. "Por que investir agora e não esperar a próxima turma?"
- Respostas: `{{RESPOSTA_FAQ_{{N}}}}` com comentário orientando o cliente

### Seção 9 — CTA final:
- Copy: `"Você chegou até aqui. Isso significa que está pronto para transformar sua prática
  clínica. Aproveite o preço especial de lançamento."`
- Botão: `GARANTIR MINHA VAGA — R$ 949,00 no PIX` — âncora `#checkout`

### Seção 10 — Checkout (`id="checkout"`):
- Formulário PHP com campos: nome completo, e-mail, CPF, telefone
- Tabs: "Pagar com PIX" / "Pagar com Cartão"
- Tab PIX: botão gerar QR Code (estrutura para SDK Mercado Pago)
- Tab Cartão: número do cartão, nome no cartão, validade (MM/AA), CVV
- Botão submit: `FINALIZAR COMPRA COM SEGURANÇA`
- Comentário: `<!-- INTEGRAÇÃO: inserir public_key e access_token do Mercado Pago aqui -->`

### Rodapé:
- Logo/nome Clínica Fuzari Goulart
- Links: Política de Privacidade | Termos de Uso
- CNPJ: `{{PREENCHER}}`
- © 2025 Clínica Fuzari Goulart

### Componentes flutuantes (HTML apenas — JS na Etapa 2):
- Botão WhatsApp fixo canto inferior direito: link `https://wa.me/5519992758914`
  com tooltip `"Dúvidas? Fale com a Lara →"` · tamanho mín. 56x56px
- Sticky CTA mobile: barra fixada no bottom, visível apenas em telas < md,
  `id="sticky-cta"` com botão `GARANTIR MINHA VAGA`
- Modal exit intent: `id="exit-modal"` oculto com overlay + campo e-mail
  + botão `RESGATAR OFERTA` + botão fechar

**Ao terminar a Etapa 1, escreva exatamente:**
`✅ ETAPA 1 CONCLUÍDA — execute a próxima mensagem para Etapa 2`

---

## ETAPA 2 — `public/js/app.js`: todo o JavaScript

Cole esta mensagem no Cursor após a Etapa 1 estar completa:

> "Execute a Etapa 2: gere o arquivo `public/js/app.js` com as seguintes funções:"

1. **Countdown timer** (`initCountdown`):
   - Ler data-alvo de `data-target="{{PREENCHER}}"` no elemento `#countdown`
   - Atualizar a cada 1s no formato `00d 00h 00m 00s`
   - Ao zerar: substituir por `"Inscrições encerradas"`

2. **Exit intent popup** (`initExitIntent`):
   - Desktop only (`window.innerWidth > 768`)
   - Disparar quando `event.clientY < 20` (cursor saindo pelo topo)
   - Mostrar `#exit-modal` uma única vez por sessão (`sessionStorage`)
   - Fechar ao clicar no overlay ou no botão fechar

3. **FAQ Accordion** (`initFaq`):
   - Selecionar todos `.faq-item`
   - Toggle classe `open` no clique do `.faq-question`
   - Animar altura com `max-height` transition (CSS + JS)
   - Fechar os demais ao abrir um

4. **Sticky CTA mobile** (`initStickyCta`):
   - Mostrar `#sticky-cta` após rolar 300px
   - Ocultar quando o usuário estiver dentro da seção `#checkout`
   - Smooth scroll ao clicar

5. **Tab de pagamento** (`initPaymentTabs`):
   - Alternar entre aba PIX e aba Cartão
   - Atualizar aria-selected e estilo ativo

6. **Formatação de inputs do cartão** (`initCardFormatting`):
   - Número do cartão: máscara `0000 0000 0000 0000`
   - Validade: máscara `MM/AA`
   - CPF: máscara `000.000.000-00`
   - Telefone: máscara `(00) 0.0000-0000`

7. **Init global:**
```javascript
document.addEventListener('DOMContentLoaded', () => {
  initCountdown();
  initExitIntent();
  initFaq();
  initStickyCta();
  initPaymentTabs();
  initCardFormatting();
});
```

**Ao terminar, escreva:**
`✅ ETAPA 2 CONCLUÍDA — execute a próxima mensagem para Etapa 3`

---

## ETAPA 3 — `checkout.php`: lógica PHP do Mercado Pago

Cole esta mensagem no Cursor após a Etapa 2:

> "Execute a Etapa 3: gere o arquivo `checkout.php` com:"

1. `require_once 'vendor/autoload.php'` (SDK Mercado Pago via Composer)
2. Configurar `MercadoPago\SDK::setAccessToken('{{MP_ACCESS_TOKEN}}')`
3. Receber POST sanitizado: nome, email, cpf, telefone, tipo (pix/cartão), token do cartão
4. Validação server-side de todos os campos (não confiar no frontend)
5. Criar preferência/pagamento conforme o tipo:
   - **PIX:** gerar `point_of_interaction.transaction_data.qr_code` e `qr_code_base64`
   - **Cartão:** processar com `token` gerado pelo SDK JS do Mercado Pago no front
6. Retornar JSON: `{ "status": "approved|pending|rejected", "qr_code": "...", "message": "..." }`
7. Em caso de aprovação: logar em arquivo `logs/pagamentos.log` (append) com timestamp, email e valor
8. Comentário indicando onde inserir envio de e-mail de confirmação (PHPMailer ou similar)

**Ao terminar, escreva:**
`✅ ETAPA 3 CONCLUÍDA — execute a próxima mensagem para Etapa 4`

---

## ETAPA 4 — Arquivos de suporte

Cole esta mensagem no Cursor após a Etapa 3:

> "Execute a Etapa 4: gere os arquivos de suporte:"

**`.htaccess`:**
```apache
# Redirecionar HTTP → HTTPS
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Headers de segurança
Header always set X-Frame-Options "SAMEORIGIN"
Header always set X-Content-Type-Options "nosniff"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
Header always set Content-Security-Policy "default-src 'self' https:; script-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://unpkg.com https://sdk.mercadopago.com; style-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com;"

# Cache de imagens e assets
<FilesMatch "\.(webp|jpg|png|svg|css|js)$">
  Header set Cache-Control "max-age=2592000, public"
</FilesMatch>
```

**`obrigado.php`:**
- Página de confirmação pós-compra
- Mensagem de boas-vindas com próximos passos: `"Verifique seu e-mail em {{PREENCHER}} minutos"`
- Disparo do evento de conversão:
  ```html
  <!-- Evento Meta Pixel Purchase -->
  <!-- Evento GA4 purchase -->
  <!-- Inserir blocos comentados prontos para ativar -->
  ```
- Botão: `Entrar no grupo WhatsApp →` com link `{{PREENCHER}}`

**`composer.json`:**
```json
{
  "require": {
    "mercadopago/dx-php": "^2.6"
  }
}
```

**`README.md`** — guia de deploy em 7 passos para a equipe:
1. Subir arquivos via FTP/Git para Hostinger
2. Rodar `composer install` no terminal
3. Inserir credenciais Mercado Pago em `checkout.php`
4. Inserir Pixel Meta e GA4 em `index.php`
5. Substituir todos os `{{PREENCHER}}` — listar cada um com localização no arquivo
6. Testar com cartão sandbox do Mercado Pago
7. Ativar SSL no painel Hostinger (se não automático)

**Ao terminar, escreva:**
`✅ PROJETO COMPLETO — todos os arquivos gerados`

---

## CHECKLIST FINAL (para o Cursor verificar antes de encerrar)

Após a Etapa 4, peça ao Cursor:
> "Revise todos os arquivos gerados e confirme o checklist:"

- [ ] Todos os `{{PREENCHER}}` estão presentes (não foram inventados valores)
- [ ] Tailwind CDN e Lucide CDN estão no `<head>`
- [ ] Schema JSON-LD de Course está correto e válido
- [ ] Countdown timer referencia `id="countdown"`
- [ ] Botão WhatsApp usa o número `5519992758914`
- [ ] Checkout tem validação PHP server-side
- [ ] `.htaccess` tem redirect HTTPS
- [ ] `obrigado.php` tem blocos comentados para Pixel e GA4
- [ ] `README.md` lista todos os `{{PREENCHER}}` com localização