<?php // pages/contatti.php ?>

<!-- HERO SECTION -->
<header class="page-hero contatti-hero">
  <img src="<?= $BASE_PATH ?>/assets/images/costruzioni.webp" alt="Cantiere edile Edilmia - Costruzioni residenziali in Veneto" class="page-hero-bg contatti-hero-bg" width="1436" height="808" fetchpriority="high" decoding="async" />
  <div class="page-hero-overlay contatti-hero-overlay"></div>
  <div class="page-hero-content">
    <div class="page-hero-text-wrapper">
      <h1 class="contatti-hero-title">
        Richiedi un Sopralluogo<br/>nel Veneto
      </h1>
      <p class="contatti-hero-description">
        Contattaci per un sopralluogo gratuito o una consulenza sui bonus fiscali.
      </p>
    </div>
  </div>
</header>

<!-- MAIN CONTATTI SECTION -->
<section class="contatti-main">
  <div class="container">
    <div class="contatti-container">
      <!-- FORM SECTION -->
      <div class="contatti-form-section">
        <h2>Richiedi Sopralluogo</h2>
        <?php
        // Messaggi di successo/errore
        if (isset($_GET['sent']) && $_GET['sent'] == '1') {
            echo '<div class="form-message form-message-success">Messaggio inviato con successo! Ti risponderemo al più presto.</div>';
        }
        if (isset($_GET['error'])) {
            echo '<div class="form-message form-message-error">' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') . '</div>';
        }
        ?>
        <form class="contatti-form" method="post" action="<?= $BASE_PATH ?>/components/process_contact.php" autocomplete="off">
          <div class="form-row-grid">
            <div class="form-group">
              <label for="cf-name">Nome e Cognome</label>
              <input type="text" id="cf-name" name="name" required maxlength="80" placeholder="Gianni Marcon" autocomplete="name" />
            </div>
            <div class="form-group">
              <label for="cf-email">Email</label>
              <input type="email" id="cf-email" name="email" required maxlength="100" placeholder="email@esempio.it" autocomplete="email" />
            </div>
          </div>
          <div class="form-row-grid">
            <div class="form-group">
              <label for="cf-phone">Telefono</label>
              <input type="tel" id="cf-phone" name="phone" maxlength="40" placeholder="+39 000 0000000" autocomplete="tel" />
            </div>
            <div class="form-group">
              <label for="cf-type">Tipo di Intervento</label>
              <select id="cf-type" name="type">
                <option value="">Seleziona...</option>
                <option value="Ristrutturazione">Ristrutturazione</option>
                <option value="Scavi">Scavi</option>
                <option value="Nuova Costruzione">Nuova Costruzione</option>
                <option value="Bioedilizia">Bioedilizia</option>
                <option value="Altro">Altro</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="cf-message">Il tuo Messaggio</label>
            <textarea id="cf-message" name="message" rows="6" required maxlength="2000" placeholder="Descrivi brevemente il tuo progetto..."></textarea>
          </div>
          <div class="form-privacy-info">
            <p>I tuoi dati saranno utilizzati esclusivamente per rispondere alla tua richiesta e non saranno comunicati a terzi.</p>
          </div>
          <div class="form-checkbox">
            <input type="checkbox" id="cf-privacy" name="privacy" required />
            <label for="cf-privacy">
              Acconsento al trattamento dei dati personali secondo la <a href="<?= $BASE_PATH ?>/policy" target="_blank">Privacy Policy</a>.
            </label>
          </div>
          <!-- Honeypot anti-bot -->
          <input type="text" name="website" class="honeypot" style="display:none;" tabindex="-1" autocomplete="off">
          <button type="submit" class="form-submit">RICHIEDI SOPRALLUOGO</button>
        </form>
      </div>

      <!-- INFO SECTION -->
      <div class="contatti-info-section">
        <div>
          <h2>Contatto Diretto</h2>
          <div class="contatti-info-list">
            <div class="contatti-info-item">
              <div class="contatti-info-icon">
                <span class="material-icons">call</span>
              </div>
              <div class="contatti-info-content">
                <p class="contatti-info-label">Telefono</p>
                <p class="contatti-info-value">
                  <a href="tel:3483732609">348 373 2609</a>
                </p>
              </div>
            </div>
            <div class="contatti-info-item">
              <div class="contatti-info-icon">
                <span class="material-icons">mail</span>
              </div>
              <div class="contatti-info-content">
                <p class="contatti-info-label">Email</p>
                <p class="contatti-info-value">
                  <a href="mailto:edilmia2016@gmail.com">edilmia2016@gmail.com</a>
                </p>
              </div>
            </div>
            <div class="contatti-info-item">
              <div class="contatti-info-icon">
                <span class="material-icons">location_on</span>
              </div>
              <div class="contatti-info-content">
                <p class="contatti-info-label">Sede Legale &amp; Operativa</p>
                <p class="contatti-info-value">
                  Via Rena n.73<br/>35025 Cartura (PD)
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- BONUS SECTION -->
        <div class="contatti-bonus-box">
          <span class="material-icons contatti-bonus-icon-bg">analytics</span>
          <div class="contatti-bonus-content">
            <div class="contatti-bonus-header">
              <span class="material-icons contatti-bonus-header-icon">verified</span>
              <span class="contatti-bonus-header-text">Supporto Tecnico Dedicato</span>
            </div>
            <h3 class="contatti-bonus-title">Bonus &amp; Incentivi per Ristrutturazioni</h3>
            <p class="contatti-bonus-description">
              Forniamo consulenza tecnica completa per l'accesso alle detrazioni fiscali e ai bonus edilizi correnti. I nostri tecnici gestiscono tutta la pratica burocratica per garantirti il massimo risparmio.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- INFO FOOTER SECTION -->
<section class="contatti-info-footer">
  <div class="container">
    <div class="contatti-info-footer-content">
      <div class="contatti-info-footer-column border-right">
        <h4>Orari di Ufficio</h4>
        <ul>
          <li><span>Lun - Ven</span> <span>08:30 - 18:30</span></li>
          <li><span>Sabato</span> <span>Su Appuntamento</span></li>
          <li><span>Domenica</span> <span>Chiuso</span></li>
        </ul>
      </div>
      <div class="contatti-info-footer-column contatti-info-footer-social">
        <h4>Seguici sui Social</h4>
        <div class="contatti-info-footer-social-links">
          <a href="https://instagram.com/edilmia.padova" target="_blank" rel="noopener" aria-label="Instagram">
            <span class="material-icons">share</span>
          </a>
        </div>
      </div>
      <div class="contatti-info-footer-column border-left">
        <h4>Area Tecnica</h4>
        <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.875rem; margin-bottom: var(--spacing-md);">
          Hai già un progetto o un computo metrico? Inviaci i file per una valutazione rapida.
        </p>
        <a href="mailto:edilmia2016@gmail.com" class="contatti-info-footer-link">
          <span>INVIA DOCUMENTI</span>
          <span class="material-icons">arrow_forward</span>
        </a>
      </div>
    </div>
  </div>
</section>
