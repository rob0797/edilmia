// ---- SERVICE PREVIEW SWITCHER ----
document.querySelectorAll('.service-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('.service-btn').forEach(b => b.classList.remove('active'));
    this.classList.add('active');
    document.getElementById('serviceImg').src = 'assets/images/' + this.dataset.img;
    document.getElementById('serviceTitle').textContent = this.dataset.title;
    document.getElementById('serviceDesc').textContent = this.dataset.desc;
  });
});

// ---- TOUCH HOVER PER IMMAGINI SERVIZI (mobile) ----
document.addEventListener('DOMContentLoaded', function() {
  // Per homepage: .servizio-card
  const servizioCards = document.querySelectorAll('.servizio-card');
  
  servizioCards.forEach(card => {
    const image = card.querySelector('.servizio-image');
    if (!image) return;
    
    // Su touch devices, aggiungi classe hover al touchstart
    card.addEventListener('touchstart', function(e) {
      // Rimuovi hover da tutte le altre card
      servizioCards.forEach(c => {
        if (c !== card) {
          c.classList.remove('touch-hover');
        }
      });
      // Aggiungi hover alla card corrente
      card.classList.add('touch-hover');
    }, { passive: true });
    
    // Rimuovi hover quando si tocca altrove o si scrolla
    document.addEventListener('touchstart', function(e) {
      if (!card.contains(e.target)) {
        card.classList.remove('touch-hover');
      }
    }, { passive: true });
    
    // Rimuovi hover quando si scrolla
    let scrollTimeout;
    window.addEventListener('scroll', function() {
      card.classList.remove('touch-hover');
      clearTimeout(scrollTimeout);
      scrollTimeout = setTimeout(function() {
        // Dopo lo scroll, rimuovi definitivamente
      }, 100);
    }, { passive: true });
  });
  
  // Per pagina servizi: .servizio-image-wrapper
  const servizioImageWrappers = document.querySelectorAll('.servizio-image-wrapper');
  
  servizioImageWrappers.forEach(wrapper => {
    const image = wrapper.querySelector('.servizio-image');
    if (!image) return;
    
    // Su touch devices, aggiungi classe hover al touchstart
    wrapper.addEventListener('touchstart', function(e) {
      // Rimuovi hover da tutti gli altri wrapper
      servizioImageWrappers.forEach(w => {
        if (w !== wrapper) {
          w.classList.remove('touch-hover');
        }
      });
      // Aggiungi hover al wrapper corrente
      wrapper.classList.add('touch-hover');
    }, { passive: true });
    
    // Rimuovi hover quando si tocca altrove o si scrolla
    document.addEventListener('touchstart', function(e) {
      if (!wrapper.contains(e.target)) {
        wrapper.classList.remove('touch-hover');
      }
    }, { passive: true });
    
    // Rimuovi hover quando si scrolla
    let scrollTimeout;
    window.addEventListener('scroll', function() {
      wrapper.classList.remove('touch-hover');
      clearTimeout(scrollTimeout);
      scrollTimeout = setTimeout(function() {
        // Dopo lo scroll, rimuovi definitivamente
      }, 100);
    }, { passive: true });
  });
});

// ---- UNIVERSAL GALLERY MODAL ----
document.addEventListener('DOMContentLoaded', function () {
  // Selettori per le gallery (progetti-grid per la pagina progetti)
  const galleryContainers = document.querySelectorAll('.gallery-preview-flex, .gallery-grid, .progetti-grid');
  const modal = document.getElementById('galleryModal');
  if (!modal) return;

  let images = [];
  let currentIndex = 0;

  // Raccogli tutte le immagini da tutte le gallery
  if (galleryContainers.length > 0) {
    galleryContainers.forEach(container => {
      const containerImages = container.querySelectorAll('img');
      containerImages.forEach(img => {
        // Aggiungi solo se non è già presente
        if (!images.includes(img)) {
          images.push(img);
        }
      });
    });
  }
  
  // Se non ci sono immagini, esci
  if (images.length === 0) return;

  const modalImg = document.getElementById('galleryModalImg');
  const modalTopbar = document.getElementById('galleryModalTopbar');
  const modalClose = document.getElementById('galleryClose');
  const modalPrev = document.getElementById('galleryPrev');
  const modalNext = document.getElementById('galleryNext');

  function showModal(idx) {
    currentIndex = idx;
    const img = images[currentIndex];
    modalImg.src = img.src;
    modalImg.alt = img.alt;
    modalTopbar.textContent = img.getAttribute('data-title') || img.alt || '';
    
    // Aggiorna contatore
    const counter = document.getElementById('galleryModalCounter');
    if (counter) {
      counter.textContent = `${currentIndex + 1} / ${images.length}`;
    }
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.style.display = 'none';
    document.body.style.overflow = '';
  }

  function showPrev() {
    showModal((currentIndex - 1 + images.length) % images.length);
  }

  function showNext() {
    showModal((currentIndex + 1) % images.length);
  }

  // Apre modale al click su ogni img
  images.forEach((img, i) => {
    img.addEventListener('click', () => showModal(i));
  });

  // Event listeners per i controlli del modale
  if (modalClose) {
    modalClose.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      closeModal();
    });
  }

  if (modalPrev) {
    modalPrev.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      showPrev();
    });
  }

  if (modalNext) {
    modalNext.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      showNext();
    });
  }

  // Chiudi modale cliccando sullo sfondo (ma non sui controlli)
  modal.addEventListener('click', function(e) {
    // Chiudi solo se si clicca direttamente sul modale (sfondo), non sui suoi figli
    if (e.target === modal || e.target.classList.contains('gallery-modal-imgbox')) {
      // Verifica che non si sia cliccato su un controllo
      if (!e.target.closest('.gallery-close') && 
          !e.target.closest('.gallery-arrow') && 
          !e.target.closest('.gallery-modal-header') &&
          e.target !== modalImg) {
        closeModal();
      }
    }
  });

  // ESC/Frecce
  document.addEventListener('keydown', function (e) {
    if (modal.style.display === 'flex') {
      if (e.key === "Escape") closeModal();
      if (e.key === "ArrowLeft") showPrev();
      if (e.key === "ArrowRight") showNext();
    }
  });
});
