document.addEventListener('DOMContentLoaded', () => {
  const body = document.body;
  const nav = document.querySelector('.site-header');
  const navToggle = document.querySelector('.nav-toggle');
  const navRight = document.querySelector('.nav-right');
  const navLinks = document.querySelectorAll('.nav-menu a');
  const themeToggle = document.querySelector('.theme-toggle');
  const backToTop = document.querySelector('.back-to-top');
  const revealItems = document.querySelectorAll('.reveal');
  const filterButtons = document.querySelectorAll('.filter-btn');
  const projectCards = document.querySelectorAll('.project-card');
  const certificateCards = document.querySelectorAll('.certificate-card');
  const modal = document.getElementById('certificateModal');
  const modalImage = document.getElementById('modalImage');
  const modalTitle = document.getElementById('certificateTitle');
  const modalOrg = document.getElementById('certificateOrg');
  const modalDate = document.getElementById('certificateDate');
  const modalId = document.getElementById('certificateId');
  const form = document.getElementById('contactForm');
  const statNumbers = document.querySelectorAll('.stat-number');
  const currentYear = document.getElementById('currentYear');

  if (currentYear) {
    currentYear.textContent = new Date().getFullYear();
  }

  const setTheme = (isLight) => {
    body.classList.toggle('light-mode', isLight);
    const icon = themeToggle ? themeToggle.querySelector('i') : null;
    if (icon) {
      icon.classList.toggle('fa-moon', !isLight);
      icon.classList.toggle('fa-sun', isLight);
    }
  };

  const savedTheme = localStorage.getItem('portfolio-theme');
  if (savedTheme === 'light') {
    setTheme(true);
  }

  if (themeToggle) {
    themeToggle.addEventListener('click', () => {
      const isLight = !body.classList.contains('light-mode');
      setTheme(isLight);
      localStorage.setItem('portfolio-theme', isLight ? 'light' : 'dark');
    });
  }

  const handleScroll = () => {
    if (nav) {
      nav.classList.toggle('scrolled', window.scrollY > 20);
    }

    if (backToTop) {
      backToTop.classList.toggle('visible', window.scrollY > 520);
    }
  };

  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();

  if (navToggle && navRight) {
    navToggle.addEventListener('click', () => {
      const isOpen = navRight.classList.toggle('open');
      navToggle.classList.toggle('is-open', isOpen);
      navToggle.setAttribute('aria-expanded', String(isOpen));
    });

    navLinks.forEach((link) => {
      link.addEventListener('click', () => {
        navRight.classList.remove('open');
        navToggle.classList.remove('is-open');
        navToggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  const revealObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.16
    }
  );

  revealItems.forEach((item) => revealObserver.observe(item));

  const sectionObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          navLinks.forEach((link) => {
            const targetId = link.getAttribute('href');
            if (targetId && targetId.startsWith('#')) {
              link.classList.toggle('active', targetId === `#${entry.target.id}`);
            }
          });
        }
      });
    },
    {
      threshold: 0.55
    }
  );

  document.querySelectorAll('main section[id]').forEach((section) => sectionObserver.observe(section));

  const applyProjectFilter = (selectedFilter) => {
    projectCards.forEach((card) => {
      const categories = card.dataset.category || '';
      const shouldShow = selectedFilter === 'all' || categories.includes(selectedFilter);
      card.classList.toggle('hidden', !shouldShow);
    });
  };

  const applyCertificateFilter = (selectedFilter) => {
    certificateCards.forEach((card) => {
      const category = card.dataset.category || '';
      const shouldShow = selectedFilter === 'all' || category === selectedFilter;
      card.classList.toggle('hidden', !shouldShow);
    });
  };

  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      const filterValue = button.dataset.filter;

      if (button.classList.contains('certificate-filter')) {
        document.querySelectorAll('.certificate-filter').forEach((btn) => btn.classList.toggle('active', btn === button));
        applyCertificateFilter(filterValue);
      } else {
        document.querySelectorAll('.filter-btn:not(.certificate-filter)').forEach((btn) => btn.classList.toggle('active', btn === button));
        applyProjectFilter(filterValue);
      }
    });
  });

  const openModal = (card) => {
    if (!modal) return;
    const title = card.dataset.title || 'Certificate';
    const issuer = card.dataset.issuer || 'Certificate Provider';
    const date = card.dataset.date || 'Date unavailable';
    const id = card.dataset.id || 'Credential ID unavailable';
    const image = card.dataset.image || '';

    modalTitle.textContent = title;
    modalOrg.textContent = issuer;
    modalDate.textContent = date;
    modalId.textContent = id;
    modalImage.src = image;
    modalImage.alt = `${title} certificate preview`;
    modal.classList.add('open');
    modal.setAttribute('aria-hidden', 'false');
  };

  const closeModal = () => {
    if (!modal) return;
    modal.classList.remove('open');
    modal.setAttribute('aria-hidden', 'true');
  };

  document.querySelectorAll('.certificate-trigger').forEach((button) => {
    button.addEventListener('click', () => {
      const card = button.closest('.certificate-card');
      if (card) {
        openModal(card);
      }
    });
  });

  document.querySelectorAll('[data-close-modal]').forEach((element) => {
    element.addEventListener('click', closeModal);
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && modal && modal.classList.contains('open')) {
      closeModal();
    }
  });

  const animateCounter = (element) => {
    const target = Number(element.dataset.target || 0);
    let current = 0;
    const duration = 1400;
    const increment = Math.ceil(target / (duration / 18));

    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        current = target;
        clearInterval(timer);
      }
      element.textContent = current;
    }, 18);
  };

  const counterObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.6
    }
  );

  statNumbers.forEach((number) => counterObserver.observe(number));

  backToTop?.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  const validateEmail = (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);

  const setFieldError = (name, message) => {
    const input = form?.querySelector(`[name="${name}"]`);
    const errorElement = form?.querySelector(`[data-error-for="${name}"]`);

    if (input) {
      input.setAttribute('aria-invalid', message ? 'true' : 'false');
    }

    if (errorElement) {
      errorElement.textContent = message || '';
    }
  };

  const validateForm = () => {
    const formData = new FormData(form);
    const name = String(formData.get('name') || '').trim();
    const email = String(formData.get('email') || '').trim();
    const subject = String(formData.get('subject') || '').trim();
    const message = String(formData.get('message') || '').trim();

    let isValid = true;

    if (!name) {
      setFieldError('name', 'Please enter your full name.');
      isValid = false;
    } else {
      setFieldError('name', '');
    }

    if (!email || !validateEmail(email)) {
      setFieldError('email', 'Please enter a valid email address.');
      isValid = false;
    } else {
      setFieldError('email', '');
    }

    if (!subject) {
      setFieldError('subject', 'Please enter a subject.');
      isValid = false;
    } else {
      setFieldError('subject', '');
    }

    if (message.length < 20) {
      setFieldError('message', 'Message must be at least 20 characters long.');
      isValid = false;
    } else {
      setFieldError('message', '');
    }

    return isValid;
  };

  form?.addEventListener('submit', (event) => {
    event.preventDefault();
    const status = form.querySelector('.form-status');

    if (!validateForm()) {
      if (status) {
        status.textContent = 'Please fix the highlighted fields.';
        status.className = 'form-status error';
      }
      return;
    }

    if (status) {
      status.textContent = 'Thank you! This frontend-only form is ready to connect to a PHP backend or API.';
      status.className = 'form-status success';
    }

    form.reset();
    ['name', 'email', 'subject', 'message'].forEach((field) => setFieldError(field, ''));
  });

  window.addEventListener('load', () => {
    document.body.classList.add('loaded');
  });
});
