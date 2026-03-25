<?php
// Landing Page — Pilates Aéreo Fuzari e Goulart
// Gerado em: <?php echo date('Y-m-d'); ?>
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilates Aéreo Fuzari e Goulart — Curso para Fisioterapeutas e Ed. Física</title>
  <meta name="description" content="Domine o Columpio e transforme sua prática clínica com o método mais completo de Pilates Aéreo terapêutico. Vagas limitadas.">

  <!-- Canonical -->
  <link rel="canonical" href="https://{{PREENCHER_URL_DOMINIO}}/index.php">

  <!-- Open Graph -->
  <meta property="og:type"        content="website">
  <meta property="og:title"       content="Pilates Aéreo Fuzari e Goulart — Curso para Fisioterapeutas e Ed. Física">
  <meta property="og:description" content="Domine o Columpio e transforme sua prática clínica com o método mais completo de Pilates Aéreo terapêutico. Vagas limitadas.">
  <meta property="og:image"       content="https://{{PREENCHER_URL_DOMINIO}}/public/images/fuzari_goular_curso_pilates_aereo_1.webp">
  <meta property="og:url"         content="https://{{PREENCHER_URL_DOMINIO}}/index.php">
  <meta property="og:site_name"   content="Clínica Fuzari Goulart">

  <!-- Preload hero image -->
  <link rel="preload" as="image" href="public/images/fuzari_goular_curso_pilates_aereo_1.webp" type="image/webp">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary:   '#6B1928',
            'primary-dark': '#4E1020',
            'primary-light': '#8C2236',
            accent:    '#4A6741',
            'accent-dark': '#354D2E',
            bg:        '#FAF6F0',
            surface:   '#F3ECE3',
            'text-main': '#1A1210',
            'text-muted': '#6B5B52',
            border:    '#DDD3C8',
          },
          fontFamily: {
            display: ['Fraunces', 'Georgia', 'serif'],
            body:    ['DM Sans', 'system-ui', 'sans-serif'],
          },
        }
      }
    }
  </script>

  <!-- Lucide Icons CDN -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

  <!-- Schema JSON-LD: Course -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Course",
    "name": "Pilates Aéreo Fuzari e Goulart",
    "description": "Curso profissional de Pilates Aéreo com Columpio para Fisioterapeutas e Profissionais de Educação Física. Método completo com apostila exclusiva.",
    "provider": {
      "@type": "Organization",
      "name": "Clínica Fuzari Goulart",
      "url": "https://{{PREENCHER_URL_DOMINIO}}"
    },
    "offers": {
      "@type": "Offer",
      "price": "949.00",
      "priceCurrency": "BRL",
      "availability": "https://schema.org/LimitedAvailability"
    },
    "educationalLevel": "Professional",
    "inLanguage": "pt-BR",
    "courseMode": "online"
  }
  </script>

  <!-- META PIXEL: colar aqui -->
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
  </script>
  <noscript>
    <img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=SEU_PIXEL_ID_AQUI&ev=PageView&noscript=1"/>
  </noscript>
  -->

  <!-- GA4: colar aqui -->
  <!--
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-XXXXXXXXXX');
  </script>
  -->

  <style>
    *, *::before, *::after { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      font-family: 'DM Sans', system-ui, sans-serif;
      background-color: #FAF6F0;
      color: #1A1210;
    }
    h1, h2, h3, .font-display { font-family: 'Fraunces', Georgia, serif; }

    /* Countdown */
    #countdown { font-variant-numeric: tabular-nums; letter-spacing: 0.05em; }

    /* FAQ accordion */
    .faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.35s ease;
    }
    .faq-item.open .faq-answer { max-height: 600px; }
    .faq-item.open .faq-icon { transform: rotate(45deg); }
    .faq-icon { transition: transform 0.3s ease; display: inline-block; }

    /* Carrossel de depoimentos mobile */
    .testimonials-carousel {
      display: flex;
      gap: 1.5rem;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: none;
    }
    .testimonials-carousel::-webkit-scrollbar { display: none; }
    .testimonial-card {
      flex: 0 0 min(85vw, 360px);
      scroll-snap-align: start;
    }

    /* Tabs pagamento */
    .tab-panel { display: none; }
    .tab-panel.active { display: block; }

    /* Input focus */
    input:focus, select:focus, textarea:focus {
      outline: 2px solid #6B1928;
      outline-offset: 2px;
    }

    /* Hero overlay */
    .hero-overlay {
      background: linear-gradient(
        to bottom,
        rgba(10, 5, 5, 0.65) 0%,
        rgba(10, 5, 5, 0.55) 60%,
        rgba(10, 5, 5, 0.70) 100%
      );
    }

    /* Sticky CTA mobile */
    #sticky-cta {
      display: none;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 40;
    }
    #sticky-cta.visible { display: block; }

    /* WhatsApp tooltip */
    .whatsapp-btn:hover .whatsapp-tooltip { opacity: 1; transform: translateX(-100%) translateX(-12px) translateY(-50%); }
    .whatsapp-tooltip {
      opacity: 0;
      transition: opacity 0.2s ease;
      position: absolute;
      top: 50%;
      right: calc(100% + 12px);
      transform: translateX(-100%) translateX(-12px) translateY(-50%);
      white-space: nowrap;
    }
    .whatsapp-btn { position: relative; }

    /* CTA button */
    .btn-primary {
      display: inline-block;
      background-color: #6B1928;
      color: #fff;
      font-weight: 700;
      padding: 16px 40px;
      border-radius: 8px;
      text-decoration: none;
      transition: all 0.2s ease;
      font-family: 'DM Sans', sans-serif;
      font-size: 1rem;
      min-height: 52px;
      cursor: pointer;
      border: none;
    }
    .btn-primary:hover {
      background-color: #4E1020;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(107,25,40,0.35);
    }
    .btn-accent {
      display: inline-block;
      background-color: #4A6741;
      color: #fff;
      font-weight: 700;
      padding: 14px 32px;
      border-radius: 8px;
      text-decoration: none;
      transition: all 0.2s ease;
      font-family: 'DM Sans', sans-serif;
      cursor: pointer;
      border: none;
    }
    .btn-accent:hover {
      background-color: #354D2E;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(74,103,65,0.35);
    }

    /* Value table */
    .value-table tr:last-child td { border-top: 2px solid #6B1928; }
    .price-strike { text-decoration: line-through; color: #9B8B84; }

    /* Modal */
    #exit-modal { display: none; }
    #exit-modal.open { display: flex; }

    @media (min-width: 768px) {
      .testimonials-carousel {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        overflow-x: visible;
      }
      .testimonial-card { flex: unset; }
    }
  </style>
</head>
<body class="bg-bg font-body text-text-main antialiased">

<!-- ============================================================ -->
<!-- SEÇÃO 0 — Barra de Urgência (sticky, topo)                   -->
<!-- ============================================================ -->
<div class="sticky top-0 z-50 bg-primary text-white text-center py-2 px-4 text-sm font-bold shadow-md">
  <span class="mr-2">⚡ Apenas <strong>{{PREENCHER}}</strong> vagas restantes — Inscrições encerram em</span>
  <span
    id="countdown"
    class="font-mono font-bold text-white"
    data-target="{{PREENCHER_DATA_ALVO_ISO8601}}"
  >00d 00h 00m 00s</span>
</div>

<!-- ============================================================ -->
<!-- SEÇÃO 1 — Hero                                               -->
<!-- ============================================================ -->
<section
  id="hero"
  class="relative min-h-screen flex items-center justify-center text-white"
  style="background: url('public/images/fuzari_goular_curso_pilates_aereo_1.webp') center center / cover no-repeat;"
>
  <div class="hero-overlay absolute inset-0"></div>
  <div class="relative z-10 max-w-4xl mx-auto px-6 py-20 text-center">

    <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm border border-white/25 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">
      <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
      Inscrições abertas — vagas limitadas
    </div>

    <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
      Domine o Columpio e Transforme Sua Clínica com o Método de Reabilitação mais Completo
      do Pilates Aéreo
    </h1>

    <p class="text-lg md:text-xl text-white/90 leading-relaxed max-w-3xl mx-auto mb-10">
      Para fisioterapeutas e profissionais de Ed. Física que querem sair do protocolo genérico
      e oferecer resultados reais em mobilidade de cintura escapular, Power House e alinhamento
      corporal — com a segurança de quem aprendeu na fonte.
    </p>

    <a href="#oferta" class="btn-primary text-lg px-10 py-4 shadow-xl">
      → Garantir minha vaga com desconto
    </a>

    <p class="mt-4 text-sm text-white/75">
      🔒 Pagamento 100% seguro · Certificado incluso · Suporte por 3 meses
    </p>

    <!-- Badges de prova -->
    <div class="mt-8 flex flex-wrap justify-center gap-4 text-sm">
      <span class="bg-white/15 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 font-medium">
        ✓ Metodologia com apostila exclusiva
      </span>
      <span class="bg-white/15 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 font-medium">
        ✓ +{{PREENCHER}} profissionais formados
      </span>
      <span class="bg-white/15 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 font-medium">
        ✓ Clínica referência em Pilates Aéreo
      </span>
    </div>
  </div>
</section>

<!-- ============================================================ -->
<!-- SEÇÃO 1.5 — Barra de Prova Social                            -->
<!-- ============================================================ -->
<section class="bg-surface border-y border-border py-12">
  <div class="max-w-5xl mx-auto px-6">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">

      <div>
        <p class="font-display text-4xl md:text-5xl font-bold text-primary">+{{PREENCHER}}</p>
        <p class="text-sm text-text-muted mt-1 font-medium">Profissionais formados</p>
      </div>

      <div>
        <p class="font-display text-4xl md:text-5xl font-bold text-primary">+{{PREENCHER}}</p>
        <p class="text-sm text-text-muted mt-1 font-medium">Anos de experiência</p>
      </div>

      <div>
        <p class="font-display text-4xl md:text-5xl font-bold text-primary">⭐ {{PREENCHER}}/5.0</p>
        <p class="text-sm text-text-muted mt-1 font-medium">Avaliação média</p>
      </div>

      <div>
        <p class="font-display text-4xl md:text-5xl font-bold text-primary">{{PREENCHER}}</p>
        <p class="text-sm text-text-muted mt-1 font-medium">Clínicas parceiras</p>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================ -->
<!-- SEÇÃO 2 — Método (PAS: Problema / Agitação / Solução)        -->
<!-- ============================================================ -->
<section id="metodo" class="py-20 md:py-28 bg-bg">
  <div class="max-w-6xl mx-auto px-6">

    <!-- Problema -->
    <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
      <div>
        <span class="inline-block text-xs font-bold uppercase tracking-widest text-primary border border-primary rounded-full px-3 py-1 mb-4">O Problema</span>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-text-main mb-6 leading-snug">
          Protocolos convencionais não foram feitos para as disfunções posturais complexas que você atende
        </h2>
        <p class="text-text-muted leading-relaxed mb-4">
          Você sabe que cada paciente é único — mas o protocolo que você aprendeu na graduação trata todos da mesma forma. Disfunções de cintura escapular, desvios posturais crônicos e comprometimento do Power House exigem mais do que exercícios padronizados.
        </p>
        <p class="text-text-muted leading-relaxed">
          A maioria dos cursos de Pilates entrega uma coleção de exercícios. Poucos entregam um <strong class="text-text-main">método clínico estruturado</strong> — com raciocínio diagnóstico, progressão segura e resultados documentáveis.
        </p>
      </div>
      <div class="rounded-2xl overflow-hidden shadow-lg">
        <img
          src="public/images/fuzari_goulart_curso_pilates_aereo_2.webp"
          alt="Profissional realizando técnica de Pilates Aéreo com Columpio — Método Fuzari Goulart"
          width="600" height="450"
          class="w-full h-full object-cover"
          loading="lazy"
        >
      </div>
    </div>

    <!-- Agitação -->
    <div class="bg-surface border border-border rounded-2xl p-8 md:p-12 mb-20">
      <span class="inline-block text-xs font-bold uppercase tracking-widest text-red-700 border border-red-700 rounded-full px-3 py-1 mb-4">O Custo de Não Agir</span>
      <h3 class="font-display text-2xl md:text-3xl font-bold text-text-main mb-6">
        Sem um método diferenciado, você perde terreno para quem já se especializou
      </h3>
      <div class="grid md:grid-cols-3 gap-6">
        <div class="flex gap-3">
          <span class="text-red-500 text-xl flex-shrink-0 mt-0.5">✗</span>
          <p class="text-text-muted">Pacientes que não percebem evolução migram para clínicas com abordagens mais específicas</p>
        </div>
        <div class="flex gap-3">
          <span class="text-red-500 text-xl flex-shrink-0 mt-0.5">✗</span>
          <p class="text-text-muted">Sem diferenciação técnica, a concorrência de preço se torna inevitável — e você perde margem</p>
        </div>
        <div class="flex gap-3">
          <span class="text-red-500 text-xl flex-shrink-0 mt-0.5">✗</span>
          <p class="text-text-muted">Protocolos genéricos não desenvolvem o olhar clínico necessário para casos de alta complexidade</p>
        </div>
      </div>
    </div>

    <!-- Solução -->
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div class="rounded-2xl overflow-hidden shadow-lg order-2 md:order-1">
        <img
          src="public/images/fuzari_goulart_curso_pilates_aereo_3.webp"
          alt="Método Fuzari Goulart — sequência terapêutica com Columpio para estabilização dinâmica"
          width="600" height="450"
          class="w-full h-full object-cover"
          loading="lazy"
        >
      </div>
      <div class="order-1 md:order-2">
        <span class="inline-block text-xs font-bold uppercase tracking-widest text-accent border border-accent rounded-full px-3 py-1 mb-4">A Solução</span>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-text-main mb-6 leading-snug">
          O Método Fuzari Goulart: rigor clínico do Columpio ao resultado terapêutico
        </h2>
        <p class="text-text-muted leading-relaxed mb-4">
          Desenvolvido ao longo de anos de prática clínica intensiva, o Método Fuzari Goulart estrutura o trabalho com o <strong class="text-text-main">Columpio</strong> do básico ao avançado, integrando avaliação postural, mobilidade de <strong class="text-text-main">cintura escapular</strong>, ativação do <strong class="text-text-main">Power House</strong>, protocolos em <strong class="text-text-main">decúbito ventral</strong>, progressão de <strong class="text-text-main">estabilização dinâmica</strong> e <strong class="text-text-main">alinhamento corporal</strong> sistêmico.
        </p>
        <p class="text-text-muted leading-relaxed mb-6">
          Cada módulo foi desenhado para ser aplicado imediatamente na clínica — com protocolo definido, apostila impressa exclusiva e suporte direto.
        </p>
        <a href="#aprenda" class="text-primary font-semibold hover:text-primary-dark transition-colors">
          Ver o que você vai aprender →
        </a>
      </div>
    </div>

  </div>
</section>

<!-- ============================================================ -->
<!-- SEÇÃO 3 — O que você vai aprender                            -->
<!-- ============================================================ -->
<section id="aprenda" class="py-20 md:py-28 bg-surface border-t border-border">
  <div class="max-w-6xl mx-auto px-6">

    <div class="text-center mb-14">
      <span class="inline-block text-xs font-bold uppercase tracking-widest text-primary border border-primary rounded-full px-3 py-1 mb-4">Conteúdo do Curso</span>
      <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-text-main">
        Do protocolo básico ao método avançado — tudo que você precisa para se diferenciar
      </h2>
    </div>

    <div class="grid md:grid-cols-3 gap-8">

      <!-- Card Básico -->
      <div class="bg-bg rounded-2xl overflow-hidden border border-border shadow-sm hover:shadow-md transition-shadow">
        <div class="aspect-[4/3] overflow-hidden">
          <img
            src="public/images/fuzari_goulart_curso_pilates_aereo_4.webp"
            alt="Módulo Básico — Pilates Aéreo Fuzari Goulart"
            width="400" height="300"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
            loading="lazy"
          >
        </div>
        <div class="p-6">
          <div class="flex items-center gap-2 mb-3">
            <span class="bg-primary/10 text-primary text-xs font-bold uppercase tracking-wide px-2 py-1 rounded">Módulo 1</span>
            <span class="text-text-muted text-sm">Nível Básico</span>
          </div>
          <h3 class="font-display text-xl font-bold text-text-main mb-4">Fundamentos do Columpio e Pilates Aéreo</h3>
          <ul class="space-y-2 text-sm text-text-muted mb-5">
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Anatomia funcional aplicada ao Columpio</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Avaliação postural inicial e triagem</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Sequências de introdução com segurança</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Ativação primária do Power House</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Protocolos de adaptação para iniciantes</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Documentação e evolução clínica</li>
          </ul>
          <div class="border-t border-border pt-4">
            <p class="text-xs text-primary font-semibold italic">
              Ao concluir: você conduzirá sessões básicas com segurança e protocolo definido.
            </p>
          </div>
        </div>
      </div>

      <!-- Card Intermediário -->
      <div class="bg-bg rounded-2xl overflow-hidden border border-primary/30 shadow-md ring-2 ring-primary/20 relative">
        <div class="absolute top-4 right-4 z-10">
          <span class="bg-primary text-white text-xs font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow">Mais popular</span>
        </div>
        <div class="aspect-[4/3] overflow-hidden">
          <img
            src="public/images/fuzari_goulart_curso_pilates_aereo_6.webp"
            alt="Módulo Intermediário — Pilates Aéreo Fuzari Goulart"
            width="400" height="300"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
            loading="lazy"
          >
        </div>
        <div class="p-6">
          <div class="flex items-center gap-2 mb-3">
            <span class="bg-primary/10 text-primary text-xs font-bold uppercase tracking-wide px-2 py-1 rounded">Módulo 2</span>
            <span class="text-text-muted text-sm">Nível Intermediário</span>
          </div>
          <h3 class="font-display text-xl font-bold text-text-main mb-4">Mobilidade, Cintura Escapular e Sequências Terapêuticas</h3>
          <ul class="space-y-2 text-sm text-text-muted mb-5">
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Mobilidade de cintura escapular: protocolos específicos</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Progressão de alinhamento corporal sistêmico</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Sequências em decúbito ventral com Columpio</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Adaptação por disfunção: cervical, dorsal, lombar</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Estabilização dinâmica — progressão clínica</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Raciocínio clínico para escolha de progressões</li>
          </ul>
          <div class="border-t border-border pt-4">
            <p class="text-xs text-primary font-semibold italic">
              Ao concluir: você aplicará sequências intermediárias adaptadas por disfunção.
            </p>
          </div>
        </div>
      </div>

      <!-- Card Avançado -->
      <div class="bg-bg rounded-2xl overflow-hidden border border-border shadow-sm hover:shadow-md transition-shadow">
        <div class="aspect-[4/3] overflow-hidden">
          <img
            src="public/images/fuzari_goulart_curso_pilates_aereo_7.webp"
            alt="Módulo Avançado — Pilates Aéreo Fuzari Goulart"
            width="400" height="300"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
            loading="lazy"
          >
        </div>
        <div class="p-6">
          <div class="flex items-center gap-2 mb-3">
            <span class="bg-primary/10 text-primary text-xs font-bold uppercase tracking-wide px-2 py-1 rounded">Módulo 3</span>
            <span class="text-text-muted text-sm">Nível Avançado</span>
          </div>
          <h3 class="font-display text-xl font-bold text-text-main mb-4">Diferenciação Clínica e Método Completo</h3>
          <ul class="space-y-2 text-sm text-text-muted mb-5">
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Integração neuro-musculoesquelética com Columpio</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Casos complexos: postura global e disfunções múltiplas</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Sequências avançadas de Power House integrado</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Prescrição e alta: critérios clínicos objetivos</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Construção de protocolos próprios supervisionados</li>
            <li class="flex gap-2"><span class="text-accent flex-shrink-0">✓</span> Posicionamento de mercado e diferenciação</li>
          </ul>
          <div class="border-t border-border pt-4">
            <p class="text-xs text-primary font-semibold italic">
              Ao concluir: você terá um método completo para diferenciação clínica imediata.
            </p>
          </div>
        </div>
      </div>

    </div>

    <div class="text-center mt-10">
      <a href="#oferta" class="btn-primary text-base px-8 py-4">
        Quero me inscrever →
      </a>
    </div>

  </div>
</section>

<!-- ============================================================ -->
<!-- SEÇÃO 4 — Depoimentos                                        -->
<!-- ============================================================ -->
<!-- CLIENTE: substituir {{DEPOIMENTO_1}}, {{DEPOIMENTO_2}}, {{DEPOIMENTO_3}} com depoimentos reais -->
<section id="depoimentos" class="py-20 md:py-28 bg-bg">
  <div class="max-w-6xl mx-auto px-6">

    <div class="text-center mb-12">
      <span class="inline-block text-xs font-bold uppercase tracking-widest text-primary border border-primary rounded-full px-3 py-1 mb-4">Depoimentos</span>
      <h2 class="font-display text-3xl md:text-4xl font-bold text-text-main">
        O que dizem os profissionais que já se formaram
      </h2>
    </div>

    <div class="testimonials-carousel pb-4">

      <!-- Depoimento 1 -->
      <div class="testimonial-card bg-surface border border-border rounded-2xl p-6 shadow-sm">
        <div class="flex gap-1 mb-4">
          <span class="text-yellow-500">⭐</span><span class="text-yellow-500">⭐</span>
          <span class="text-yellow-500">⭐</span><span class="text-yellow-500">⭐</span>
          <span class="text-yellow-500">⭐</span>
        </div>
        <p class="text-text-muted leading-relaxed mb-5 italic">
          "{{DEPOIMENTO_1}}"
        </p>
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold flex-shrink-0">
            {{PREENCHER}}
          </div>
          <div>
            <p class="font-semibold text-text-main text-sm">{{PREENCHER}}</p>
            <p class="text-xs text-text-muted">{{PREENCHER}}</p>
          </div>
        </div>
      </div>

      <!-- Depoimento 2 -->
      <div class="testimonial-card bg-surface border border-border rounded-2xl p-6 shadow-sm">
        <div class="flex gap-1 mb-4">
          <span class="text-yellow-500">⭐</span><span class="text-yellow-500">⭐</span>
          <span class="text-yellow-500">⭐</span><span class="text-yellow-500">⭐</span>
          <span class="text-yellow-500">⭐</span>
        </div>
        <p class="text-text-muted leading-relaxed mb-5 italic">
          "{{DEPOIMENTO_2}}"
        </p>
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold flex-shrink-0">
            {{PREENCHER}}
          </div>
          <div>
            <p class="font-semibold text-text-main text-sm">{{PREENCHER}}</p>
            <p class="text-xs text-text-muted">{{PREENCHER}}</p>
          </div>
        </div>
      </div>

      <!-- Depoimento 3 -->
      <div class="testimonial-card bg-surface border border-border rounded-2xl p-6 shadow-sm">
        <div class="flex gap-1 mb-4">
          <span class="text-yellow-500">⭐</span><span class="text-yellow-500">⭐</span>
          <span class="text-yellow-500">⭐</span><span class="text-yellow-500">⭐</span>
          <span class="text-yellow-500">⭐</span>
        </div>
        <p class="text-text-muted leading-relaxed mb-5 italic">
          "{{DEPOIMENTO_3}}"
        </p>
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold flex-shrink-0">
            {{PREENCHER}}
          </div>
          <div>
            <p class="font-semibold text-text-main text-sm">{{PREENCHER}}</p>
            <p class="text-xs text-text-muted">{{PREENCHER}}</p>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ============================================================ -->
<!-- SEÇÃO 5 — Material Exclusivo + Stack de Bônus                -->
<!-- ============================================================ -->
<section id="bonus" class="py-20 md:py-28 bg-primary text-white">
  <div class="max-w-6xl mx-auto px-6">

    <div class="text-center mb-14">
      <span class="inline-block text-xs font-bold uppercase tracking-widest text-white/70 border border-white/30 rounded-full px-3 py-1 mb-4">Material Exclusivo</span>
      <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold">
        Tudo o que você recebe ao se inscrever
      </h2>
      <p class="mt-4 text-white/75 max-w-2xl mx-auto">
        Mais do que um curso — um método completo para transformar sua prática clínica.
      </p>
    </div>

    <!-- Imagens do material -->
    <div class="grid md:grid-cols-2 gap-6 mb-16">
      <div class="rounded-2xl overflow-hidden shadow-lg aspect-[4/3]">
        <img
          src="public/images/fuzari_goulart_curso_pilates_aereo_9.webp"
          alt="Apostila exclusiva do Método Fuzari Goulart — material impresso do curso de Pilates Aéreo"
          width="600" height="450"
          class="w-full h-full object-cover"
          loading="lazy"
        >
      </div>
      <div class="rounded-2xl overflow-hidden shadow-lg aspect-[4/3]">
        <img
          src="public/images/fuzari_goulart_curso_pilates_aereo_10.webp"
          alt="Material didático completo do curso Pilates Aéreo Fuzari Goulart"
          width="600" height="450"
          class="w-full h-full object-cover"
          loading="lazy"
        >
      </div>
    </div>

    <!-- Tabela de valor percebido -->
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl overflow-hidden max-w-3xl mx-auto">
      <table class="value-table w-full text-sm md:text-base">
        <thead>
          <tr class="bg-white/10 border-b border-white/20">
            <th class="text-left py-3 px-5 font-semibold">O que você recebe</th>
            <th class="text-right py-3 px-5 font-semibold">Valor</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-white/10 hover:bg-white/5 transition-colors">
            <td class="py-3 px-5">📚 Apostila Impressa exclusiva</td>
            <td class="py-3 px-5 text-right font-semibold text-white/80">{{PREENCHER}}</td>
          </tr>
          <tr class="border-b border-white/10 hover:bg-white/5 transition-colors">
            <td class="py-3 px-5">🎥 Curso completo (vídeos)</td>
            <td class="py-3 px-5 text-right font-semibold text-white/80">{{PREENCHER}}</td>
          </tr>
          <tr class="border-b border-white/10 hover:bg-white/5 transition-colors">
            <td class="py-3 px-5">💬 Suporte 3 meses WhatsApp</td>
            <td class="py-3 px-5 text-right font-semibold text-white/80">{{PREENCHER}}</td>
          </tr>
          <tr class="border-b border-white/10 hover:bg-white/5 transition-colors">
            <td class="py-3 px-5">📜 Certificado de conclusão</td>
            <td class="py-3 px-5 text-right font-semibold text-white/80">{{PREENCHER}}</td>
          </tr>
          <tr class="border-b border-white/10 hover:bg-white/5 transition-colors">
            <td class="py-3 px-5">🎁 Bônus 1: {{PREENCHER}}</td>
            <td class="py-3 px-5 text-right font-semibold text-white/80">{{PREENCHER}}</td>
          </tr>
          <tr class="border-b border-white/10 hover:bg-white/5 transition-colors">
            <td class="py-3 px-5">🎁 Bônus 2: {{PREENCHER}}</td>
            <td class="py-3 px-5 text-right font-semibold text-white/80">{{PREENCHER}}</td>
          </tr>
          <tr class="border-b border-white/10 bg-white/5">
            <td class="py-3 px-5 font-bold text-white/70">Valor total</td>
            <td class="py-3 px-5 text-right font-bold text-white/70 price-strike">R$ {{PREENCHER}}</td>
          </tr>
          <tr class="bg-white/15">
            <td class="py-4 px-5 font-bold text-lg text-white">⚡ Você paga hoje</td>
            <td class="py-4 px-5 text-right font-display font-bold text-2xl text-yellow-300">R$ 949,00 no PIX</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="text-center mt-10">
      <a href="#oferta" class="inline-block bg-white text-primary font-bold text-lg px-10 py-4 rounded-lg hover:bg-white/90 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-1">
        → Quero tudo isso agora
      </a>
    </div>

  </div>
</section>

<!-- ============================================================ -->
<!-- SEÇÃO 6 — Quem Somos                                         -->
<!-- ============================================================ -->
<section id="quem-somos" class="py-20 md:py-28 bg-bg">
  <div class="max-w-6xl mx-auto px-6">

    <div class="text-center mb-14">
      <span class="inline-block text-xs font-bold uppercase tracking-widest text-primary border border-primary rounded-full px-3 py-1 mb-4">Quem somos</span>
      <h2 class="font-display text-3xl md:text-4xl font-bold text-text-main">
        Clínica Fuzari Goulart
      </h2>
      <p class="mt-4 text-text-muted max-w-2xl mx-auto leading-relaxed">
        Referência em Pilates Aéreo terapêutico, formamos profissionais com rigor científico e método clínico documentado.
      </p>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-start">

      <!-- Imagem da clínica -->
      <div class="rounded-2xl overflow-hidden shadow-lg">
        <img
          src="public/images/fuzari_goulart_curso_pilates_aereo_5.webp"
          alt="Fundadoras da Clínica Fuzari Goulart — especialistas em Pilates Aéreo terapêutico"
          width="600" height="500"
          class="w-full h-full object-cover"
          loading="lazy"
        >
      </div>

      <!-- Bio das sócias -->
      <div class="space-y-8">

        <!-- Sócia 1 -->
        <div class="border-l-4 border-primary pl-6">
          <h3 class="font-display text-xl font-bold text-text-main mb-1">{{PREENCHER — Nome Sócia 1}}</h3>
          <p class="text-sm text-primary font-semibold mb-3">{{PREENCHER — Formação / Especialização}}</p>
          <p class="text-text-muted leading-relaxed text-sm">
            {{PREENCHER — Apresentação profissional: anos de experiência, especialização em Pilates Aéreo,
            propósito clínico e impacto no método}}
          </p>
          <p class="mt-2 text-xs text-text-muted font-medium">
            Registro profissional: {{INSERIR SE APLICÁVEL — CREFITO / CREF}}
          </p>
        </div>

        <!-- Sócia 2 -->
        <div class="border-l-4 border-accent pl-6">
          <h3 class="font-display text-xl font-bold text-text-main mb-1">{{PREENCHER — Nome Sócia 2}}</h3>
          <p class="text-sm text-accent font-semibold mb-3">{{PREENCHER — Formação / Especialização}}</p>
          <p class="text-text-muted leading-relaxed text-sm">
            {{PREENCHER — Apresentação profissional: anos de experiência, especialização em Pilates Aéreo,
            propósito clínico e impacto no método}}
          </p>
          <p class="mt-2 text-xs text-text-muted font-medium">
            Registro profissional: {{INSERIR SE APLICÁVEL — CREFITO / CREF}}
          </p>
        </div>

        <!-- Missão -->
        <div class="bg-surface border border-border rounded-xl p-5">
          <p class="text-text-muted italic text-sm leading-relaxed">
            "{{PREENCHER — Citação ou declaração de missão das fundadoras sobre o propósito do curso e o impacto na formação profissional}}"
          </p>
        </div>

      </div>
    </div>

  </div>
</section>

<!-- ============================================================ -->
<!-- SEÇÃO 7 — Oferta                                             -->
<!-- ============================================================ -->
<section id="oferta" class="py-20 md:py-28 bg-surface border-t border-border">
  <div class="max-w-2xl mx-auto px-6">

    <div class="bg-bg border-2 border-primary rounded-3xl overflow-hidden shadow-2xl">

      <!-- Header da oferta -->
      <div class="bg-primary text-white text-center py-4 px-6">
        <p class="text-sm font-bold uppercase tracking-widest">⚡ OFERTA ESPECIAL — até {{PREENCHER}}</p>
      </div>

      <div class="p-8 md:p-10 text-center">

        <!-- Preço riscado -->
        <p class="text-text-muted text-lg mb-1">
          De: <span class="line-through font-semibold">R$ {{PREENCHER}}</span>
        </p>

        <!-- Preço PIX -->
        <div class="my-4">
          <p class="text-sm font-semibold text-accent uppercase tracking-wide mb-1">PIX — melhor preço</p>
          <p class="font-display text-6xl md:text-7xl font-bold text-primary leading-none">R$ 949</p>
          <p class="text-text-muted text-sm mt-1">,00 à vista no PIX</p>
        </div>

        <div class="flex items-center gap-3 my-4">
          <div class="flex-1 h-px bg-border"></div>
          <span class="text-xs text-text-muted font-medium">ou</span>
          <div class="flex-1 h-px bg-border"></div>
        </div>

        <!-- Preço cartão -->
        <p class="text-text-muted mb-6">
          R$ 999,00 no cartão · ou <strong class="text-text-main">10x de R$ 119,90</strong>
        </p>

        <!-- Botão principal -->
        <a
          href="#checkout"
          class="btn-primary block w-full text-center text-lg py-5 px-6 shadow-lg"
          style="font-size: 1.1rem;"
        >
          GARANTIR MINHA VAGA AGORA
        </a>

        <!-- Selos de segurança -->
        <div class="flex flex-wrap justify-center gap-3 mt-5 text-xs text-text-muted font-medium">
          <span class="flex items-center gap-1 bg-surface px-3 py-1.5 rounded-full border border-border">🔒 SSL Seguro</span>
          <span class="flex items-center gap-1 bg-surface px-3 py-1.5 rounded-full border border-border">💳 Mercado Pago</span>
          <span class="flex items-center gap-1 bg-surface px-3 py-1.5 rounded-full border border-border">VISA</span>
          <span class="flex items-center gap-1 bg-surface px-3 py-1.5 rounded-full border border-border">MASTER</span>
          <span class="flex items-center gap-1 bg-surface px-3 py-1.5 rounded-full border border-border">ELO</span>
          <span class="flex items-center gap-1 bg-surface px-3 py-1.5 rounded-full border border-border">PIX</span>
        </div>

        <!-- Garantia -->
        <div class="mt-6 bg-green-50 border border-green-200 rounded-xl p-4 text-left">
          <div class="flex gap-3 items-start">
            <span class="text-2xl flex-shrink-0">🛡️</span>
            <div>
              <p class="font-bold text-green-800 text-sm">Garantia incondicional de 7 dias</p>
              <p class="text-green-700 text-xs mt-1 leading-relaxed">
                Se em 7 dias você não ficar satisfeito com o conteúdo, devolvemos 100% do seu investimento — sem burocracia, sem perguntas.
              </p>
            </div>
          </div>
        </div>

        <!-- Micro-copy de urgência -->
        <p class="mt-4 text-xs text-text-muted italic text-center">
          👁️ <strong>{{PREENCHER}}</strong> pessoas estão vendo esta página agora · <strong>{{PREENCHER}}</strong> vagas restantes
        </p>

      </div>
    </div>

  </div>
</section>

<!-- ============================================================ -->
<!-- SEÇÃO 8 — FAQ Accordion                                      -->
<!-- ============================================================ -->
<!-- CLIENTE: substituir {{RESPOSTA_FAQ_N}} com as respostas reais de cada pergunta -->
<section id="faq" class="py-20 md:py-28 bg-bg">
  <div class="max-w-3xl mx-auto px-6">

    <div class="text-center mb-12">
      <span class="inline-block text-xs font-bold uppercase tracking-widest text-primary border border-primary rounded-full px-3 py-1 mb-4">Dúvidas frequentes</span>
      <h2 class="font-display text-3xl md:text-4xl font-bold text-text-main">
        Perguntas que você pode estar fazendo
      </h2>
    </div>

    <div class="space-y-3">

      <!-- FAQ 1 -->
      <div class="faq-item bg-surface border border-border rounded-xl overflow-hidden">
        <button
          class="faq-question w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-semibold text-text-main hover:bg-border/40 transition-colors"
          aria-expanded="false"
        >
          <span>Preciso ter experiência prévia em Pilates?</span>
          <span class="faq-icon text-primary text-2xl leading-none flex-shrink-0">+</span>
        </button>
        <div class="faq-answer px-6 pb-0">
          <div class="pb-5 text-text-muted leading-relaxed text-sm">
            <!-- CLIENTE: responda aqui — ex.: "Não é necessário. O curso começa pelos fundamentos..." -->
            {{RESPOSTA_FAQ_1}}
          </div>
        </div>
      </div>

      <!-- FAQ 2 -->
      <div class="faq-item bg-surface border border-border rounded-xl overflow-hidden">
        <button
          class="faq-question w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-semibold text-text-main hover:bg-border/40 transition-colors"
          aria-expanded="false"
        >
          <span>Consigo aplicar sem ter um Columpio próprio?</span>
          <span class="faq-icon text-primary text-2xl leading-none flex-shrink-0">+</span>
        </button>
        <div class="faq-answer px-6 pb-0">
          <div class="pb-5 text-text-muted leading-relaxed text-sm">
            <!-- CLIENTE: responda aqui — ex.: "Durante o treinamento presencial você usará o Columpio da clínica..." -->
            {{RESPOSTA_FAQ_2}}
          </div>
        </div>
      </div>

      <!-- FAQ 3 -->
      <div class="faq-item bg-surface border border-border rounded-xl overflow-hidden">
        <button
          class="faq-question w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-semibold text-text-main hover:bg-border/40 transition-colors"
          aria-expanded="false"
        >
          <span>O curso é presencial ou online?</span>
          <span class="faq-icon text-primary text-2xl leading-none flex-shrink-0">+</span>
        </button>
        <div class="faq-answer px-6 pb-0">
          <div class="pb-5 text-text-muted leading-relaxed text-sm">
            <!-- CLIENTE: detalhe o formato (presencial, online, híbrido), dias e local -->
            {{RESPOSTA_FAQ_3}}
          </div>
        </div>
      </div>

      <!-- FAQ 4 -->
      <div class="faq-item bg-surface border border-border rounded-xl overflow-hidden">
        <button
          class="faq-question w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-semibold text-text-main hover:bg-border/40 transition-colors"
          aria-expanded="false"
        >
          <span>Recebo certificado reconhecido pelo CREFITO/CREF?</span>
          <span class="faq-icon text-primary text-2xl leading-none flex-shrink-0">+</span>
        </button>
        <div class="faq-answer px-6 pb-0">
          <div class="pb-5 text-text-muted leading-relaxed text-sm">
            <!-- CLIENTE: esclareça o tipo de certificado e validade para pontuação profissional -->
            {{RESPOSTA_FAQ_4}}
          </div>
        </div>
      </div>

      <!-- FAQ 5 -->
      <div class="faq-item bg-surface border border-border rounded-xl overflow-hidden">
        <button
          class="faq-question w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-semibold text-text-main hover:bg-border/40 transition-colors"
          aria-expanded="false"
        >
          <span>E se não conseguir aplicar na minha clínica?</span>
          <span class="faq-icon text-primary text-2xl leading-none flex-shrink-0">+</span>
        </button>
        <div class="faq-answer px-6 pb-0">
          <div class="pb-5 text-text-muted leading-relaxed text-sm">
            <!-- CLIENTE: mencione suporte, garantia de 7 dias, e acessibilidade do método -->
            {{RESPOSTA_FAQ_5}}
          </div>
        </div>
      </div>

      <!-- FAQ 6 -->
      <div class="faq-item bg-surface border border-border rounded-xl overflow-hidden">
        <button
          class="faq-question w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-semibold text-text-main hover:bg-border/40 transition-colors"
          aria-expanded="false"
        >
          <span>Por que investir agora e não esperar a próxima turma?</span>
          <span class="faq-icon text-primary text-2xl leading-none flex-shrink-0">+</span>
        </button>
        <div class="faq-answer px-6 pb-0">
          <div class="pb-5 text-text-muted leading-relaxed text-sm">
            <!-- CLIENTE: argumente com preço de lançamento, vagas limitadas, mercado em expansão -->
            {{RESPOSTA_FAQ_6}}
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ============================================================ -->
<!-- SEÇÃO 9 — CTA Final                                          -->
<!-- ============================================================ -->
<section id="cta-final" class="py-20 md:py-28 bg-primary text-white text-center">
  <div class="max-w-3xl mx-auto px-6">

    <div class="text-5xl mb-6">🎯</div>
    <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold mb-6 leading-snug">
      Você chegou até aqui. Isso significa que está pronto para transformar sua prática clínica.
    </h2>
    <p class="text-white/80 text-lg leading-relaxed mb-8 max-w-xl mx-auto">
      Aproveite o preço especial de lançamento e comece com o método que já formou
      +{{PREENCHER}} profissionais em todo o Brasil.
    </p>

    <a href="#checkout" class="inline-block bg-white text-primary font-display font-bold text-xl px-12 py-5 rounded-xl shadow-2xl hover:bg-white/95 hover:-translate-y-1 transition-all">
      GARANTIR MINHA VAGA — R$ 949,00 no PIX
    </a>

    <p class="mt-5 text-white/60 text-sm">
      🔒 Pagamento 100% seguro · Garantia incondicional de 7 dias · Certificado incluso
    </p>

  </div>
</section>

<!-- ============================================================ -->
<!-- SEÇÃO 10 — Checkout                                          -->
<!-- ============================================================ -->
<!-- INTEGRAÇÃO: inserir public_key e access_token do Mercado Pago aqui (em checkout.php) -->
<section id="checkout" class="py-20 md:py-28 bg-bg border-t border-border">
  <div class="max-w-xl mx-auto px-6">

    <div class="text-center mb-10">
      <span class="inline-block text-xs font-bold uppercase tracking-widest text-primary border border-primary rounded-full px-3 py-1 mb-4">Finalizar inscrição</span>
      <h2 class="font-display text-3xl font-bold text-text-main">
        Garanta sua vaga com segurança
      </h2>
      <p class="text-text-muted mt-2 text-sm">Insira seus dados abaixo para concluir a compra.</p>
    </div>

    <div class="bg-surface border border-border rounded-2xl p-6 md:p-8 shadow-lg">

      <form
        id="checkout-form"
        action="checkout.php"
        method="POST"
        novalidate
        class="space-y-4"
      >

        <!-- Dados pessoais -->
        <div>
          <label for="nome" class="block text-sm font-semibold text-text-main mb-1">Nome completo</label>
          <input
            type="text" id="nome" name="nome"
            autocomplete="name" required
            placeholder="Seu nome completo"
            class="w-full border border-border rounded-lg px-4 py-3 text-sm bg-bg placeholder-text-muted/60 transition-colors"
          >
          <p class="form-error text-xs text-red-600 mt-1 hidden"></p>
        </div>

        <div>
          <label for="email" class="block text-sm font-semibold text-text-main mb-1">E-mail</label>
          <input
            type="email" id="email" name="email"
            autocomplete="email" required
            placeholder="seu@email.com"
            class="w-full border border-border rounded-lg px-4 py-3 text-sm bg-bg placeholder-text-muted/60 transition-colors"
          >
          <p class="form-error text-xs text-red-600 mt-1 hidden"></p>
        </div>

        <div>
          <label for="cpf" class="block text-sm font-semibold text-text-main mb-1">CPF</label>
          <input
            type="text" id="cpf" name="cpf"
            autocomplete="off" required
            placeholder="000.000.000-00"
            maxlength="14"
            class="w-full border border-border rounded-lg px-4 py-3 text-sm bg-bg placeholder-text-muted/60 transition-colors"
          >
          <p class="form-error text-xs text-red-600 mt-1 hidden"></p>
        </div>

        <div>
          <label for="telefone" class="block text-sm font-semibold text-text-main mb-1">Telefone / WhatsApp</label>
          <input
            type="tel" id="telefone" name="telefone"
            autocomplete="tel" required
            placeholder="(00) 9.0000-0000"
            maxlength="16"
            class="w-full border border-border rounded-lg px-4 py-3 text-sm bg-bg placeholder-text-muted/60 transition-colors"
          >
          <p class="form-error text-xs text-red-600 mt-1 hidden"></p>
        </div>

        <!-- Tabs de pagamento -->
        <div class="mt-6">
          <p class="text-sm font-semibold text-text-main mb-3">Forma de pagamento</p>
          <div class="flex rounded-lg border border-border overflow-hidden" role="tablist">
            <button
              type="button"
              id="tab-pix"
              role="tab"
              aria-selected="true"
              aria-controls="panel-pix"
              class="flex-1 py-3 px-4 text-sm font-semibold transition-colors bg-primary text-white"
              data-tab="pix"
            >
              🔑 PIX — R$ 949,00
            </button>
            <button
              type="button"
              id="tab-cartao"
              role="tab"
              aria-selected="false"
              aria-controls="panel-cartao"
              class="flex-1 py-3 px-4 text-sm font-semibold transition-colors bg-bg text-text-muted hover:bg-surface"
              data-tab="cartao"
            >
              💳 Cartão — R$ 999,00
            </button>
          </div>

          <!-- Painel PIX -->
          <div id="panel-pix" class="tab-panel active mt-4 bg-green-50 border border-green-200 rounded-xl p-5 text-center">
            <p class="text-green-800 font-semibold text-sm mb-2">
              ✅ Melhor preço via PIX — R$ 949,00
            </p>
            <p class="text-green-700 text-xs leading-relaxed">
              Ao clicar em "Finalizar Compra", um QR Code PIX será gerado para você.<br>
              O acesso é liberado automaticamente após a confirmação do pagamento.
            </p>
            <input type="hidden" name="tipo_pagamento" id="tipo_pagamento" value="pix">
          </div>

          <!-- Painel Cartão -->
          <div id="panel-cartao" class="tab-panel mt-4 space-y-3">
            <div>
              <label for="card-number" class="block text-sm font-semibold text-text-main mb-1">Número do cartão</label>
              <input
                type="text" id="card-number" name="card_number"
                autocomplete="cc-number"
                placeholder="0000 0000 0000 0000"
                maxlength="19"
                class="w-full border border-border rounded-lg px-4 py-3 text-sm bg-bg"
              >
            </div>
            <div>
              <label for="card-name" class="block text-sm font-semibold text-text-main mb-1">Nome no cartão</label>
              <input
                type="text" id="card-name" name="card_name"
                autocomplete="cc-name"
                placeholder="NOME COMO NO CARTÃO"
                class="w-full border border-border rounded-lg px-4 py-3 text-sm bg-bg uppercase"
              >
            </div>
            <div class="grid grid-cols-2 gap-3">
              <div>
                <label for="card-expiry" class="block text-sm font-semibold text-text-main mb-1">Validade</label>
                <input
                  type="text" id="card-expiry" name="card_expiry"
                  autocomplete="cc-exp"
                  placeholder="MM/AA"
                  maxlength="5"
                  class="w-full border border-border rounded-lg px-4 py-3 text-sm bg-bg"
                >
              </div>
              <div>
                <label for="card-cvv" class="block text-sm font-semibold text-text-main mb-1">CVV</label>
                <input
                  type="text" id="card-cvv" name="card_cvv"
                  autocomplete="cc-csc"
                  placeholder="000"
                  maxlength="4"
                  class="w-full border border-border rounded-lg px-4 py-3 text-sm bg-bg"
                >
              </div>
            </div>
            <input type="hidden" name="card_token" id="card-token" value="">
            <!-- INTEGRAÇÃO MP: o token será gerado via SDK JS do Mercado Pago -->
          </div>
        </div>

        <!-- Botão submit -->
        <button
          type="submit"
          id="btn-submit"
          class="btn-primary w-full mt-4 text-center text-base py-4 flex items-center justify-center gap-2"
        >
          <span class="btn-label">FINALIZAR COMPRA COM SEGURANÇA 🔒</span>
          <span class="btn-spinner hidden" aria-hidden="true">
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 22 6.477 22 12h-4z"></path>
            </svg>
          </span>
        </button>

        <p class="text-center text-xs text-text-muted mt-2">
          🔒 Seus dados são protegidos com criptografia SSL
        </p>

      </form>

    </div>
  </div>
</section>

<!-- ============================================================ -->
<!-- RODAPÉ                                                        -->
<!-- ============================================================ -->
<footer class="bg-[#1A1210] text-white/70 py-12">
  <div class="max-w-5xl mx-auto px-6">

    <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-8">
      <div>
        <p class="font-display text-xl font-bold text-white">Clínica Fuzari Goulart</p>
        <p class="text-sm text-white/50 mt-1">Referência em Pilates Aéreo Terapêutico</p>
      </div>
      <div class="flex gap-6 text-sm">
        <a href="{{PREENCHER_URL_POLITICA_PRIVACIDADE}}" class="hover:text-white transition-colors">Política de Privacidade</a>
        <a href="{{PREENCHER_URL_TERMOS_DE_USO}}" class="hover:text-white transition-colors">Termos de Uso</a>
      </div>
    </div>

    <div class="border-t border-white/10 pt-6 flex flex-col md:flex-row items-center justify-between gap-2 text-xs text-white/40">
      <p>CNPJ: {{PREENCHER}}</p>
      <p>© 2025 Clínica Fuzari Goulart. Todos os direitos reservados.</p>
    </div>

  </div>
</footer>

<!-- ============================================================ -->
<!-- COMPONENTE: Botão WhatsApp flutuante                         -->
<!-- ============================================================ -->
<a
  href="https://wa.me/5519992758914"
  target="_blank"
  rel="noopener noreferrer"
  class="whatsapp-btn fixed bottom-6 right-6 z-50 flex items-center justify-center w-14 h-14 bg-green-500 hover:bg-green-600 rounded-full shadow-lg hover:shadow-xl transition-all hover:-translate-y-1"
  aria-label="Fale conosco pelo WhatsApp — Dúvidas? Fale com a Lara"
  style="min-width: 56px; min-height: 56px;"
>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="26" height="26" aria-hidden="true">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
  </svg>
  <span class="whatsapp-tooltip bg-[#1A1210] text-white text-xs font-semibold px-3 py-1.5 rounded-lg shadow-lg pointer-events-none">
    Dúvidas? Fale com a Lara →
  </span>
</a>

<!-- ============================================================ -->
<!-- COMPONENTE: Sticky CTA Mobile (visível apenas < md)          -->
<!-- ============================================================ -->
<div
  id="sticky-cta"
  class="md:hidden bg-primary border-t-2 border-primary-dark px-4 py-3 shadow-2xl"
  aria-label="Garantir vaga"
>
  <a
    href="#checkout"
    class="block w-full text-center bg-white text-primary font-bold py-3.5 rounded-lg text-sm shadow-md"
  >
    GARANTIR MINHA VAGA — R$ 949,00
  </a>
</div>

<!-- ============================================================ -->
<!-- COMPONENTE: Modal Exit Intent                                 -->
<!-- ============================================================ -->
<div
  id="exit-modal"
  class="fixed inset-0 z-[60] bg-black/60 items-center justify-center px-4"
  role="dialog"
  aria-modal="true"
  aria-labelledby="exit-modal-title"
>
  <div class="bg-bg rounded-2xl shadow-2xl max-w-md w-full overflow-hidden">

    <!-- Header -->
    <div class="bg-primary text-white px-6 py-5 relative">
      <button
        id="exit-modal-close"
        class="absolute top-3 right-4 text-white/70 hover:text-white text-2xl leading-none font-light"
        aria-label="Fechar"
      >&times;</button>
      <p class="text-xs font-bold uppercase tracking-widest text-white/70 mb-1">Espere!</p>
      <h2 id="exit-modal-title" class="font-display text-2xl font-bold">
        Antes de ir… receba um desconto exclusivo
      </h2>
    </div>

    <!-- Body -->
    <div class="p-6">
      <p class="text-text-muted text-sm leading-relaxed mb-5">
        Cadastre seu e-mail abaixo e receba um <strong class="text-text-main">cupom especial</strong> com condição ainda melhor do que a da página. Válido apenas por <strong class="text-text-main">{{PREENCHER}} horas</strong>.
      </p>
      <form id="exit-intent-form" class="space-y-3" novalidate>
        <input
          type="email"
          id="exit-email"
          name="email"
          autocomplete="email"
          required
          placeholder="Seu melhor e-mail"
          class="w-full border border-border rounded-lg px-4 py-3 text-sm bg-surface"
        >
        <button
          type="submit"
          class="btn-primary w-full text-center py-3.5"
        >
          RESGATAR OFERTA EXCLUSIVA
        </button>
        <p class="text-center text-xs text-text-muted">🔒 Sem spam. Apenas seu cupom.</p>
      </form>
    </div>

  </div>
</div>

<!-- ============================================================ -->
<!-- Scripts                                                       -->
<!-- ============================================================ -->
<script src="public/js/app.js" defer></script>
<script>
  // Inicializar ícones Lucide
  document.addEventListener('DOMContentLoaded', () => {
    if (typeof lucide !== 'undefined') lucide.createIcons();
  });
</script>

<!--
=================================================================
PSYCHOLOGY CHECKLIST — Implementado neste arquivo
=================================================================
[x] Loss aversion    → Barra urgência sticky + "vagas restantes" + countdown
[x] Social proof     → Seção 1.5 (métricas) + Seção 4 (depoimentos) + badges hero
[x] Authority        → Seção 6 (quem somos, CREFITO/CREF, anos experiência)
[x] Scarcity         → "Vagas limitadas" em múltiplos pontos + urgency bar
[x] Urgency          → Countdown timer no topo + "Oferta especial até {{PREENCHER}}"
[x] Commitment       → Garantia 7 dias (reduz risco percebido de entrada)
[x] Clarity bias     → Um CTA primário por seção, sem nav links
[x] Cognitive fluency→ Copy em bullets, headers escaneáveis, frases curtas
=================================================================
-->

</body>
</html>
