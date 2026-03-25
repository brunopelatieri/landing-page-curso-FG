/**
 * app.js — Pilates Aéreo Fuzari e Goulart
 * JavaScript vanilla — sem jQuery, sem frameworks
 */

/* ============================================================
   1. COUNTDOWN TIMER
   ============================================================ */
function initCountdown() {
  const el = document.getElementById('countdown');
  if (!el) return;

  const targetStr = el.dataset.target;
  if (!targetStr || targetStr.includes('{{PREENCHER')) {
    // Data-alvo não preenchida: exibir zeros até o cliente configurar
    el.textContent = '00d 00h 00m 00s';
    return;
  }

  const targetDate = new Date(targetStr).getTime();

  function pad(n) {
    return String(n).padStart(2, '0');
  }

  function tick() {
    const now  = Date.now();
    const diff = targetDate - now;

    if (diff <= 0) {
      el.textContent = 'Inscrições encerradas';
      el.closest('[class*="sticky"]')?.classList.add('opacity-75');
      return;
    }

    const days    = Math.floor(diff / 86400000);
    const hours   = Math.floor((diff % 86400000) / 3600000);
    const minutes = Math.floor((diff % 3600000)  / 60000);
    const seconds = Math.floor((diff % 60000)    / 1000);

    el.textContent = `${pad(days)}d ${pad(hours)}h ${pad(minutes)}m ${pad(seconds)}s`;
    setTimeout(tick, 1000);
  }

  tick();
}

/* ============================================================
   2. EXIT INTENT POPUP
   ============================================================ */
function initExitIntent() {
  // Desktop only
  if (window.innerWidth <= 768) return;

  // Mostrar apenas uma vez por sessão
  if (sessionStorage.getItem('exitIntentShown')) return;

  const modal     = document.getElementById('exit-modal');
  const btnClose  = document.getElementById('exit-modal-close');
  if (!modal) return;

  let triggered = false;

  function showModal() {
    if (triggered) return;
    triggered = true;
    sessionStorage.setItem('exitIntentShown', '1');
    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  }

  // Disparar quando cursor sair pelo topo
  document.addEventListener('mouseleave', function onMouseLeave(e) {
    if (e.clientY < 20) {
      showModal();
      document.removeEventListener('mouseleave', onMouseLeave);
    }
  });

  // Fechar no botão "×"
  if (btnClose) {
    btnClose.addEventListener('click', closeModal);
  }

  // Fechar ao clicar no overlay (fora do card)
  modal.addEventListener('click', function(e) {
    if (e.target === modal) closeModal();
  });

  // Fechar com Escape
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && modal.classList.contains('open')) closeModal();
  });

  // Submissão do formulário do modal (estrutura para integração)
  const exitForm = document.getElementById('exit-intent-form');
  if (exitForm) {
    exitForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const emailInput = document.getElementById('exit-email');
      if (!emailInput || !emailInput.value.trim()) return;
      // TODO: enviar e-mail para webhook/CRM aqui
      exitForm.innerHTML = `
        <div class="text-center py-4">
          <p class="text-2xl mb-2">✅</p>
          <p class="font-semibold text-text-main">Cupom enviado para o seu e-mail!</p>
          <p class="text-sm text-text-muted mt-1">Verifique sua caixa de entrada.</p>
        </div>
      `;
      setTimeout(closeModal, 3000);
    });
  }
}

/* ============================================================
   3. FAQ ACCORDION
   ============================================================ */
function initFaq() {
  const items = document.querySelectorAll('.faq-item');
  if (!items.length) return;

  items.forEach(function(item) {
    const question = item.querySelector('.faq-question');
    const answer   = item.querySelector('.faq-answer');
    if (!question || !answer) return;

    question.addEventListener('click', function() {
      const isOpen = item.classList.contains('open');

      // Fechar todos os outros
      items.forEach(function(other) {
        if (other !== item && other.classList.contains('open')) {
          other.classList.remove('open');
          const otherQ = other.querySelector('.faq-question');
          if (otherQ) otherQ.setAttribute('aria-expanded', 'false');
        }
      });

      // Toggle do item clicado
      if (isOpen) {
        item.classList.remove('open');
        question.setAttribute('aria-expanded', 'false');
      } else {
        item.classList.add('open');
        question.setAttribute('aria-expanded', 'true');
      }
    });
  });
}

/* ============================================================
   4. STICKY CTA MOBILE
   ============================================================ */
function initStickyCta() {
  const stickyCta  = document.getElementById('sticky-cta');
  const checkout   = document.getElementById('checkout');
  if (!stickyCta) return;

  const SCROLL_THRESHOLD = 300;

  // Smooth scroll ao clicar no botão interno
  const ctaLink = stickyCta.querySelector('a');
  if (ctaLink) {
    ctaLink.addEventListener('click', function(e) {
      const href = ctaLink.getAttribute('href');
      if (href && href.startsWith('#')) {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
    });
  }

  function updateStickyCta() {
    const scrollY = window.scrollY || window.pageYOffset;

    // Ocultar se dentro da seção checkout
    if (checkout) {
      const rect = checkout.getBoundingClientRect();
      if (rect.top <= window.innerHeight && rect.bottom >= 0) {
        stickyCta.classList.remove('visible');
        return;
      }
    }

    // Mostrar após SCROLL_THRESHOLD px
    if (scrollY > SCROLL_THRESHOLD) {
      stickyCta.classList.add('visible');
    } else {
      stickyCta.classList.remove('visible');
    }
  }

  window.addEventListener('scroll', updateStickyCta, { passive: true });
  updateStickyCta();
}

/* ============================================================
   5. TABS DE PAGAMENTO
   ============================================================ */
function initPaymentTabs() {
  const tabs   = document.querySelectorAll('[role="tab"]');
  const panels = document.querySelectorAll('.tab-panel');
  const tipoPagamento = document.getElementById('tipo_pagamento');
  if (!tabs.length || !panels.length) return;

  tabs.forEach(function(tab) {
    tab.addEventListener('click', function() {
      const targetTab = tab.dataset.tab;

      // Atualizar estado visual dos tabs
      tabs.forEach(function(t) {
        const isActive = t.dataset.tab === targetTab;
        t.setAttribute('aria-selected', isActive ? 'true' : 'false');

        if (isActive) {
          t.classList.remove('bg-bg', 'text-text-muted', 'hover:bg-surface');
          t.classList.add('bg-primary', 'text-white');
        } else {
          t.classList.remove('bg-primary', 'text-white');
          t.classList.add('bg-bg', 'text-text-muted', 'hover:bg-surface');
        }
      });

      // Mostrar/ocultar painéis
      panels.forEach(function(panel) {
        if (panel.id === 'panel-' + targetTab) {
          panel.classList.add('active');
        } else {
          panel.classList.remove('active');
        }
      });

      // Atualizar campo hidden de tipo de pagamento
      if (tipoPagamento) {
        tipoPagamento.value = targetTab;
      }
    });
  });
}

/* ============================================================
   6. FORMATAÇÃO DE INPUTS
   ============================================================ */
function initCardFormatting() {

  // Utilitário: aplicar máscara
  function applyMask(value, pattern) {
    let result  = '';
    let valIdx  = 0;
    const digits = value.replace(/\D/g, '');

    for (let i = 0; i < pattern.length && valIdx < digits.length; i++) {
      if (pattern[i] === '0') {
        result += digits[valIdx++];
      } else {
        result += pattern[i];
        // Se o próximo caractere do valor também for o separador, avançar
        if (digits[valIdx] === pattern[i]) valIdx++;
      }
    }
    return result;
  }

  // Número do cartão — 0000 0000 0000 0000
  const cardNumber = document.getElementById('card-number');
  if (cardNumber) {
    cardNumber.addEventListener('input', function() {
      const raw     = this.value.replace(/\D/g, '').slice(0, 16);
      const groups  = raw.match(/.{1,4}/g) || [];
      this.value    = groups.join(' ');
    });
  }

  // Validade — MM/AA
  const cardExpiry = document.getElementById('card-expiry');
  if (cardExpiry) {
    cardExpiry.addEventListener('input', function() {
      const raw  = this.value.replace(/\D/g, '').slice(0, 4);
      if (raw.length > 2) {
        this.value = raw.slice(0, 2) + '/' + raw.slice(2);
      } else {
        this.value = raw;
      }
    });
  }

  // CPF — 000.000.000-00
  const cpfInput = document.getElementById('cpf');
  if (cpfInput) {
    cpfInput.addEventListener('input', function() {
      this.value = applyMask(this.value, '000.000.000-00');
    });
  }

  // Telefone — (00) 0.0000-0000
  const telefoneInput = document.getElementById('telefone');
  if (telefoneInput) {
    telefoneInput.addEventListener('input', function() {
      const raw = this.value.replace(/\D/g, '').slice(0, 11);
      let result = '';

      if (raw.length === 0) {
        result = '';
      } else if (raw.length <= 2) {
        result = '(' + raw;
      } else if (raw.length <= 3) {
        result = '(' + raw.slice(0, 2) + ') ' + raw.slice(2);
      } else if (raw.length <= 7) {
        result = '(' + raw.slice(0, 2) + ') ' + raw.slice(2, 3) + '.' + raw.slice(3);
      } else {
        result = '(' + raw.slice(0, 2) + ') ' + raw.slice(2, 3) + '.' + raw.slice(3, 7) + '-' + raw.slice(7);
      }

      this.value = result;
    });
  }
}

/* ============================================================
   7. VALIDAÇÃO E SUBMISSÃO DO FORMULÁRIO DE CHECKOUT
   ============================================================ */
function initCheckoutForm() {
  const form      = document.getElementById('checkout-form');
  const btnSubmit = document.getElementById('btn-submit');
  if (!form || !btnSubmit) return;

  const btnLabel   = btnSubmit.querySelector('.btn-label');
  const btnSpinner = btnSubmit.querySelector('.btn-spinner');

  function showError(input, msg) {
    const errorEl = input.closest('div')?.querySelector('.form-error');
    if (errorEl) {
      errorEl.textContent = msg;
      errorEl.classList.remove('hidden');
    }
    input.classList.add('border-red-500');
    input.classList.remove('border-border');
  }

  function clearError(input) {
    const errorEl = input.closest('div')?.querySelector('.form-error');
    if (errorEl) errorEl.classList.add('hidden');
    input.classList.remove('border-red-500');
    input.classList.add('border-border');
  }

  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function isValidCpf(cpf) {
    const digits = cpf.replace(/\D/g, '');
    return digits.length === 11;
  }

  // Limpar erros ao digitar
  form.querySelectorAll('input').forEach(function(input) {
    input.addEventListener('input', function() { clearError(this); });
  });

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    let valid = true;

    const nome     = document.getElementById('nome');
    const email    = document.getElementById('email');
    const cpf      = document.getElementById('cpf');
    const telefone = document.getElementById('telefone');

    if (!nome.value.trim() || nome.value.trim().split(' ').length < 2) {
      showError(nome, 'Informe seu nome completo (nome e sobrenome).');
      valid = false;
    }

    if (!isValidEmail(email.value.trim())) {
      showError(email, 'Informe um e-mail válido.');
      valid = false;
    }

    if (!isValidCpf(cpf.value)) {
      showError(cpf, 'CPF deve ter 11 dígitos.');
      valid = false;
    }

    const telDigits = telefone.value.replace(/\D/g, '');
    if (telDigits.length < 10) {
      showError(telefone, 'Informe um telefone válido com DDD.');
      valid = false;
    }

    if (!valid) return;

    // Ativar spinner, desabilitar botão
    btnSubmit.disabled = true;
    if (btnLabel)   btnLabel.classList.add('hidden');
    if (btnSpinner) btnSpinner.classList.remove('hidden');

    // Enviar via fetch
    const formData = new FormData(form);

    fetch('checkout.php', {
      method: 'POST',
      body: formData,
    })
      .then(function(res) { return res.json(); })
      .then(function(data) {
        if (data.status === 'approved') {
          window.location.href = 'obrigado.php';
        } else if (data.status === 'pending' && data.qr_code) {
          renderQrCode(data);
        } else {
          showPaymentError(data.message || 'Houve um erro. Tente novamente.');
          resetButton();
        }
      })
      .catch(function() {
        showPaymentError('Erro de conexão. Verifique sua internet e tente novamente.');
        resetButton();
      });
  });

  function resetButton() {
    btnSubmit.disabled = false;
    if (btnLabel)   btnLabel.classList.remove('hidden');
    if (btnSpinner) btnSpinner.classList.add('hidden');
  }

  function showPaymentError(msg) {
    let errorBox = document.getElementById('payment-error');
    if (!errorBox) {
      errorBox = document.createElement('div');
      errorBox.id = 'payment-error';
      errorBox.className = 'mt-3 bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg px-4 py-3';
      btnSubmit.after(errorBox);
    }
    errorBox.textContent = msg;
    errorBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }

  function renderQrCode(data) {
    const panel = document.getElementById('panel-pix');
    if (!panel) return;

    panel.innerHTML = `
      <div class="text-center py-4">
        <p class="text-green-800 font-semibold text-sm mb-3">
          ✅ QR Code PIX gerado! Escaneie para pagar.
        </p>
        ${data.qr_code_base64
          ? `<img src="data:image/png;base64,${data.qr_code_base64}" alt="QR Code PIX" class="mx-auto mb-3 w-48 h-48">`
          : ''}
        ${data.qr_code
          ? `<div class="bg-gray-100 rounded p-3 text-xs break-all text-gray-600 mt-2 select-all">${data.qr_code}</div>`
          : ''}
        <p class="text-xs text-green-700 mt-3">
          Após o pagamento, o acesso será liberado automaticamente em até 5 minutos.
        </p>
      </div>
    `;

    resetButton();
  }
}

/* ============================================================
   8. SMOOTH SCROLL PARA ÂNCORAS INTERNAS
   ============================================================ */
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
    anchor.addEventListener('click', function(e) {
      const href   = this.getAttribute('href');
      const target = document.querySelector(href);
      if (!target) return;
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });
}

/* ============================================================
   9. RASTREAMENTO DE EVENTOS (estrutura para Meta Pixel / GA4)
   ============================================================ */
function initTracking() {
  // Clique nos botões CTA principais
  document.querySelectorAll('.btn-primary, .btn-accent').forEach(function(btn) {
    btn.addEventListener('click', function() {
      if (typeof fbq !== 'undefined') {
        fbq('track', 'InitiateCheckout');
      }
      if (typeof gtag !== 'undefined') {
        gtag('event', 'begin_checkout', { currency: 'BRL', value: 949 });
      }
    });
  });

  // Visualização da seção de oferta (IntersectionObserver)
  const ofertaSection = document.getElementById('oferta');
  if (ofertaSection && 'IntersectionObserver' in window) {
    let viewed = false;
    const observer = new IntersectionObserver(function(entries) {
      if (entries[0].isIntersecting && !viewed) {
        viewed = true;
        if (typeof fbq !== 'undefined') fbq('track', 'ViewContent');
        if (typeof gtag !== 'undefined') gtag('event', 'view_item', { currency: 'BRL', value: 949 });
        observer.disconnect();
      }
    }, { threshold: 0.3 });
    observer.observe(ofertaSection);
  }
}

/* ============================================================
   INIT GLOBAL
   ============================================================ */
document.addEventListener('DOMContentLoaded', function() {
  initCountdown();
  initExitIntent();
  initFaq();
  initStickyCta();
  initPaymentTabs();
  initCardFormatting();
  initCheckoutForm();
  initSmoothScroll();
  initTracking();
});
