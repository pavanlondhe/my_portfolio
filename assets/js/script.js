document.addEventListener('DOMContentLoaded', () => {
  const yearEl = document.getElementById('year');
  if (yearEl) {
    yearEl.textContent = new Date().getFullYear();
  }

  const nav = document.querySelector('.main-nav');
  const menuToggle = document.querySelector('.menu-toggle');
  if (nav && menuToggle) {
    menuToggle.addEventListener('click', () => {
      nav.classList.toggle('open');
    });

    nav.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => nav.classList.remove('open'));
    });
  }

  const backToTop = document.querySelector('.back-to-top');
  if (backToTop) {
    window.addEventListener('scroll', () => {
      backToTop.classList.toggle('visible', window.scrollY > 380);
    });

    backToTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  const form = document.getElementById('contactForm');
  if (form) {
    const setError = (fieldName, message) => {
      const errorEl = form.querySelector(`[data-error-for="${fieldName}"]`);
      const field = form.querySelector(`[name="${fieldName}"]`);
      if (errorEl) errorEl.textContent = message;
      if (field) field.setAttribute('aria-invalid', message ? 'true' : 'false');
    };

    form.addEventListener('submit', (event) => {
      event.preventDefault();
      const formData = new FormData(form);
      const name = String(formData.get('name') || '').trim();
      const email = String(formData.get('email') || '').trim();
      const subject = String(formData.get('subject') || '').trim();
      const message = String(formData.get('message') || '').trim();
      const statusEl = form.querySelector('.form-status');
      let valid = true;

      if (!name) {
        setError('name', 'Please enter your name.');
        valid = false;
      } else {
        setError('name', '');
      }

      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        setError('email', 'Please enter a valid email address.');
        valid = false;
      } else {
        setError('email', '');
      }

      if (!subject) {
        setError('subject', 'Please enter a subject.');
        valid = false;
      } else {
        setError('subject', '');
      }

      if (message.length < 20) {
        setError('message', 'Message must be at least 20 characters long.');
        valid = false;
      } else {
        setError('message', '');
      }

      if (statusEl) {
        statusEl.textContent = valid ? 'Sending your message...' : 'Please fix the highlighted fields.';
        statusEl.className = `form-status ${valid ? 'success' : 'error'}`;
      }

      if (!valid) {
        return;
      }

      const payload = new FormData(form);
      payload.append('contact_submit', '1');

      fetch(window.location.href, {
        method: 'POST',
        body: payload,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
        .then(() => {
          form.reset();
          if (statusEl) {
            statusEl.textContent = 'Thank you! Your message has been saved successfully.';
            statusEl.className = 'form-status success';
          }
        })
        .catch(() => {
          if (statusEl) {
            statusEl.textContent = 'There was a problem sending your message. Please try again.';
            statusEl.className = 'form-status error';
          }
        });
    });
  }

  const filterButtons = document.querySelectorAll('.filter-btn');
  const projectCards = document.querySelectorAll('.project-card');
  if (filterButtons.length && projectCards.length) {
    filterButtons.forEach((button) => {
      button.addEventListener('click', () => {
        filterButtons.forEach((btn) => btn.classList.toggle('active', btn === button));
        const filter = button.dataset.filter;
        projectCards.forEach((card) => {
          const cardCategory = String(card.dataset.category || '').toLowerCase();
          const visible = filter === 'all' || cardCategory === filter.toLowerCase();
          card.style.display = visible ? 'block' : 'none';
        });
      });
    });
  }
});
