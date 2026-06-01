<footer>
  <div class="container footer-container">
    <div class="footer-brand">
      <div class="footer-logo">
        <img src="<?= $BASE_PATH ?>/assets/images/logo/edilmia_logo_yellow.png" alt="Edilmia Logo" />
      </div>
      <p class="footer-description">
        Da Gianni Marcon, l'impegno per abitazioni confortevoli e funzionali, realizzate con esperienza e competenza tecnica. La qualità è la nostra firma.
      </p>
      <div class="footer-social">
        <a href="https://facebook.com/edilmia.padova" target="_blank" rel="noopener">Facebook</a>
        <a href="https://instagram.com/edilmia.padova" target="_blank" rel="noopener">Instagram</a>
      </div>
    </div>
    <div class="footer-column">
      <h5>Link Rapidi</h5>
      <ul>
        <li><a href="<?= $BASE_PATH ?>/chi-siamo">Chi Siamo</a></li>
        <li><a href="<?= $BASE_PATH ?>/progetti">Progetti Realizzati</a></li>
        <li><a href="<?= $BASE_PATH ?>/servizi">Servizi Edili</a></li>
        <li><a href="<?= $BASE_PATH ?>/contatti">Contatti</a></li>
      </ul>
    </div>
    <div class="footer-column footer-contact">
      <h5>Sede Operativa</h5>
      <p>
        Area d'intervento:<br/>
        Veneto e dintorni
      </p>
      <p>
        T: <a href="tel:3483732609">348 373 2609</a><br/>
        E: <a href="mailto:edilmia2016@gmail.com">edilmia2016@gmail.com</a>
      </p>
    </div>
  </div>
  <div class="container footer-bottom">
    <p>© <?php echo date('Y'); ?> EDILMIA - P.IVA 04953100288</p>
    <div>
      <a href="<?= $BASE_PATH ?>/policy">Privacy Policy</a>
    </div>
  </div>
</footer>

<!-- Gallery Modale Globale -->
<div id="galleryModal" class="gallery-modal" style="display:none;">
    <button class="gallery-close" id="galleryClose" aria-label="Chiudi modale" type="button">
        <span class="material-icons">close</span>
    </button>
    <div class="gallery-modal-imgbox">
        <div class="gallery-modal-header">
            <div class="gallery-modal-imgtitle" id="galleryModalTopbar"></div>
            <div class="gallery-modal-counter" id="galleryModalCounter"></div>
        </div>
        <img class="gallery-modal-img" id="galleryModalImg" src="" alt="Anteprima" />
        <button class="gallery-arrow gallery-prev" id="galleryPrev" aria-label="Immagine precedente" type="button">
            <span class="material-icons">chevron_left</span>
        </button>
        <button class="gallery-arrow gallery-next" id="galleryNext" aria-label="Immagine successiva" type="button">
            <span class="material-icons">chevron_right</span>
        </button>
    </div>
</div>

<script src="<?= $BASE_PATH ?>/assets/js/main.js"></script>
