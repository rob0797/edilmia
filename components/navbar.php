<header>
  <div class="container header-container">
    <a href="<?= $BASE_PATH ?>/" class="logo-link">
      <img src="<?= $BASE_PATH ?>/assets/images/logo/edilmia_logo_mix.png" alt="Edilmia Logo" class="logo-img">
    </a>
    <nav class="nav-wrapper">
      <button class="nav-toggle" id="navToggle" aria-label="Toggle menu" type="button">
        <span class="material-icons">menu</span>
      </button>
      <ul class="nav-menu" id="navMenu">
        <li><a href="<?= $BASE_PATH ?>/">Home</a></li>
        <li><a href="<?= $BASE_PATH ?>/servizi">Servizi</a></li>
        <li><a href="<?= $BASE_PATH ?>/progetti">Progetti</a></li>
        <li><a href="<?= $BASE_PATH ?>/chi-siamo">Azienda</a></li>
        <li><a href="<?= $BASE_PATH ?>/contatti" class="btn btn-primary">Contattaci</a></li>
      </ul>
    </nav>
  </div>
</header>
<script>
(function() {
  'use strict';
  
  function initNavbar() {
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (!navToggle || !navMenu) {
      console.warn('Navbar elements not found');
      return;
    }
    
    function toggleMenu() {
      navMenu.classList.toggle('nav-menu-open');
      const icon = navToggle.querySelector('.material-icons');
      if (icon) {
        icon.textContent = navMenu.classList.contains('nav-menu-open') ? 'close' : 'menu';
      }
    }
    
    function closeMenu() {
      navMenu.classList.remove('nav-menu-open');
      const icon = navToggle.querySelector('.material-icons');
      if (icon) {
        icon.textContent = 'menu';
      }
    }
    
    // Toggle menu al click
    navToggle.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      toggleMenu();
    });
    
    // Chiudi menu quando si clicca fuori
    document.addEventListener('click', function(e) {
      if (navMenu.classList.contains('nav-menu-open')) {
        if (!navMenu.contains(e.target) && !navToggle.contains(e.target)) {
          closeMenu();
        }
      }
    });
    
    // Chiudi menu quando si clicca su un link
    navMenu.querySelectorAll('a').forEach(function(link) {
      link.addEventListener('click', function() {
        closeMenu();
      });
    });
    
    // Chiudi menu con ESC
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && navMenu.classList.contains('nav-menu-open')) {
        closeMenu();
      }
    });
  }
  
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initNavbar);
  } else {
    initNavbar();
  }
})();
</script>
