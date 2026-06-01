<?php // pages/progetti.php

// Percorso cartella immagini
$imgDir = __DIR__ . '/../assets/images/gallery/';
$imgUrlBase = $BASE_PATH . '/assets/images/gallery/';

// Estensioni ammesse
$allowed = ['webp','jpg','jpeg','png','gif'];

$imgs = [];
if (is_dir($imgDir)) {
    foreach (scandir($imgDir) as $f) {
        $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $imgs[] = $f;
        }
    }
    sort($imgs, SORT_NATURAL | SORT_FLAG_CASE);
}

// Categorie progetti
$categorie = [
    'TUTTI' => 'Tutti i progetti',
    'SCAVI' => 'Scavi & Fognature',
    'DEMOLIZIONI' => 'Demolizioni',
    'RISTRUTTURAZIONI' => 'Ristrutturazioni',
    'COSTRUZIONI' => 'Costruzioni',
    'BIOEDILIZIA' => 'Bioedilizia & Isolamento'
];

// Catalogo metadati per filename (primi 6 allineati alle immagini in ordine scandir+sort)
$metaByFile = [
    '488257596_1445411230106502_2256204227822125739_n.webp' => [
        'title' => 'Preparazione area di cantiere',
        'meta' => 'Padova | Costruzioni',
        'desc' => 'Allestimento e predisposizione area per intervento residenziale.',
        'cat' => 'costruzioni'
    ],
    '488649813_1448268956487396_6057778152402569835_n.webp' => [
        'title' => 'Demolizione controllata',
        'meta' => 'Vicenza | Demolizioni',
        'desc' => 'Demolizione strutture esistenti con gestione e smaltimento materiali.',
        'cat' => 'demolizioni'
    ],
    '488688883_1449856899661935_345626674278322764_n.webp' => [
        'title' => 'Rifacimento copertura',
        'meta' => 'Treviso | Ristrutturazioni',
        'desc' => 'Ripristino del manto di copertura e finiture per tetto esistente.',
        'cat' => 'ristrutturazioni'
    ],
    '490018662_1453895529258072_4507559232357791479_n.webp' => [
        'title' => 'Struttura tetto in legno',
        'meta' => 'Venezia | Costruzioni',
        'desc' => 'Realizzazione struttura portante e predisposizione pacchetto di copertura.',
        'cat' => 'costruzioni'
    ],
    '490023681_1456703712310587_1831723512086674964_n.webp' => [
        'title' => 'Pavimentazione esterna',
        'meta' => 'Verona | Opere esterne',
        'desc' => 'Posa pavimentazione e sistemazione area carrabile/pedonale.',
        'cat' => 'ristrutturazioni'
    ],
    '490220608_1451196736194618_3545207977703567327_n.webp' => [
        'title' => 'Isolamento copertura',
        'meta' => 'Padova | Isolamento',
        'desc' => 'Efficientamento termico della copertura con materiali ad alte prestazioni.',
        'cat' => 'bioedilizia'
    ],
];

// Fallback: restituisce metadati per file non in catalogo (no titoli da filename numerico)
function getProjectMeta($filename, $metaByFile) {
    if (isset($metaByFile[$filename])) {
        return $metaByFile[$filename];
    }
    $basename = pathinfo($filename, PATHINFO_FILENAME);
    $fallbackGeneric = [
        'meta' => 'Veneto | Lavori edili',
        'desc' => 'Lavori di cantiere e ripristino eseguiti secondo le specifiche di progetto.',
        'cat' => 'costruzioni'
    ];
    // Filename quasi tutto numeri/underscore -> titolo generico
    $withoutDigits = preg_replace('/[0-9_]/', '', $basename);
    if ($withoutDigits === '' || strlen($withoutDigits) <= 1) {
        $fallbackGeneric['title'] = 'Intervento in cantiere';
        return $fallbackGeneric;
    }
    // Filename testuale: titolo da filename (sostituisci _ e - con spazio, normalizza)
    $title = preg_replace('/[\-_]+/', ' ', $basename);
    $title = preg_replace('/\s+/', ' ', trim($title));
    $fallbackGeneric['title'] = $title !== '' ? ucwords(strtolower($title)) : 'Intervento in cantiere';
    return $fallbackGeneric;
}
?>

<!-- HERO SECTION -->
<header class="page-hero progetti-hero">
  <img src="<?= $BASE_PATH ?>/assets/images/finiture_esterni.webp" alt="Finiture esterne completate su edificio residenziale nel Veneto" class="page-hero-bg progetti-hero-bg" width="1357" height="1030" fetchpriority="high" decoding="async" />
  <div class="page-hero-overlay"></div>
  <div class="page-hero-content">
    <div class="page-hero-text-wrapper">
      <p class="page-hero-label">IL TUO PROGETTO, LA NOSTRA ESPERIENZA</p>
      <h1 class="page-hero-title">
        PROGETTI REALI,<br/>RISULTATI CONCRETI
      </h1>
      <p class="page-hero-description">
        Una panoramica delle nostre realizzazioni in tutto il Veneto, dagli scavi complessi alle finiture di pregio. Ristrutturazioni chiavi in mano gestite con un referente unico e preventivi blindati.
      </p>
    </div>
  </div>
</header>

<!-- FILTERS -->
<div class="progetti-filters">
  <div class="container">
    <div class="progetti-filters-container">
      <button class="progetti-filter-btn active" data-filter="all">TUTTI</button>
      <button class="progetti-filter-btn" data-filter="scavi">SCAVI</button>
      <button class="progetti-filter-btn" data-filter="demolizioni">DEMOLIZIONI</button>
      <button class="progetti-filter-btn" data-filter="ristrutturazioni">RISTRUTTURAZIONI</button>
      <button class="progetti-filter-btn" data-filter="costruzioni">COSTRUZIONI</button>
      <button class="progetti-filter-btn" data-filter="bioedilizia">BIOEDILIZIA</button>
    </div>
  </div>
</div>

<!-- PROGETTI GRID -->
<section class="progetti-grid-section">
  <div class="container">
    <div class="progetti-grid" id="progettiGrid">
      <?php if (!empty($imgs)): ?>
        <?php
        $progetti = [];
        foreach ($imgs as $file) {
            $meta = getProjectMeta($file, $metaByFile);
            $progetti[] = [
                'img' => $file,
                'title' => $meta['title'],
                'meta' => $meta['meta'],
                'desc' => $meta['desc'],
                'cat' => $meta['cat']
            ];
        }
        ?>
        <!-- DEBUG progetti (rimuovibile): <?php foreach ($progetti as $p) { echo htmlspecialchars($p['img']) . ' => title=' . htmlspecialchars($p['title']) . ' | meta=' . htmlspecialchars($p['meta']) . ' | cat=' . htmlspecialchars($p['cat']) . ' | '; } ?> -->
        <?php
        foreach ($progetti as $progetto):
          if (!$progetto['img']) continue;
          $imgTitle = htmlspecialchars($progetto['title']);
        ?>
          <div class="progetto-card" data-category="<?= htmlspecialchars($progetto['cat']) ?>">
            <div class="progetto-image-wrapper">
              <img src="<?= $imgUrlBase . $progetto['img'] ?>" 
                   alt="<?= $imgTitle ?>" 
                   class="progetto-image"
                   data-title="<?= $imgTitle ?>">
            </div>
            <div class="progetto-content">
              <div class="progetto-accent"></div>
              <h3 class="progetto-title"><?= $imgTitle ?></h3>
              <p class="progetto-meta"><?= htmlspecialchars($progetto['meta']) ?></p>
              <p class="progetto-description"><?= htmlspecialchars($progetto['desc']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div style="color: var(--color-gray-dark); font-size: 1.15rem; padding: 2.5rem 0; text-align: center; grid-column: 1 / -1;">
          <p>I progetti sono in fase di aggiornamento.</p>
          <p style="margin-top:0.75rem;">Edilmia realizza scavi, costruzioni, ristrutturazioni e interventi di bioedilizia in tutto il Veneto. <a href="<?= $BASE_PATH ?>/contatti">Contattaci</a> per vedere i nostri lavori più recenti.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- CTA SECTION -->
<section class="progetti-cta-section">
  <div class="container">
    <h2 class="progetti-cta-title">Partiamo dal tuo prossimo progetto</h2>
    <p class="progetti-cta-description">
      La partnership solida che cerchi: gestione client-centric, supporto fiscale e qualità certificata da Gianni Marcon.
    </p>
    <a href="<?= $BASE_PATH ?>/contatti" class="btn progetti-cta-btn">RICHIEDI UN SOPRALLUOGO PER IL TUO PROGETTO</a>
  </div>
</section>

<script>
// Filtri progetti (funzionalità base)
document.addEventListener('DOMContentLoaded', function() {
  const filterButtons = document.querySelectorAll('.progetti-filter-btn');
  const progettoCards = document.querySelectorAll('.progetto-card');
  const filtersContainer = document.querySelector('.progetti-filters');
  
  // Filtri progetti
  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      const filter = this.getAttribute('data-filter');
      
      // Aggiorna bottoni attivi
      filterButtons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');
      
      // Filtra progetti
      progettoCards.forEach(card => {
        if (filter === 'all' || card.getAttribute('data-category') === filter) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
  
  // Click su immagini per aprire modal (se presente)
  const progettoImages = document.querySelectorAll('.progetto-image');
  progettoImages.forEach(img => {
    img.addEventListener('click', function() {
      const modal = document.getElementById('galleryModal');
      const modalImg = document.getElementById('galleryModalImg');
      const modalTitle = document.getElementById('galleryModalTopbar');
      
      if (modal && modalImg && modalTitle) {
        modalImg.src = this.src;
        modalTitle.textContent = this.getAttribute('data-title') || '';
        modal.style.display = 'flex';
      }
    });
  });
  
  // Touch hover per card progetti (mobile) - zoom immagine
  progettoCards.forEach(card => {
    const imageWrapper = card.querySelector('.progetto-image-wrapper');
    if (!imageWrapper) return;
    
    // Su touch devices, aggiungi classe hover al touchstart
    card.addEventListener('touchstart', function(e) {
      // Rimuovi hover da tutte le altre card
      progettoCards.forEach(c => {
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
  
  // Scroll automatico filtri (solo su mobile)
  if (filtersContainer && window.innerWidth <= 480) {
    let autoScrollEnabled = true;
    let scrollDirection = 1; // 1 = destra, -1 = sinistra
    let scrollSpeed = 0.2; // pixel per frame (rallentato)
    let maxScroll = 0;
    let currentScroll = 0;
    
    // Calcola scroll massimo
    function updateMaxScroll() {
      maxScroll = filtersContainer.scrollWidth - filtersContainer.clientWidth;
    }
    
    updateMaxScroll();
    window.addEventListener('resize', updateMaxScroll);
    
    // Scroll automatico
    function autoScroll() {
      if (!autoScrollEnabled || maxScroll <= 0) return;
      
      currentScroll += scrollSpeed * scrollDirection;
      
      // Inverti direzione agli estremi
      if (currentScroll >= maxScroll) {
        currentScroll = maxScroll;
        scrollDirection = -1;
      } else if (currentScroll <= 0) {
        currentScroll = 0;
        scrollDirection = 1;
      }
      
      filtersContainer.scrollLeft = currentScroll;
    }
    
    // Ferma scroll quando l'utente interagisce
    let userInteracting = false;
    let interactionTimeout;
    
    filtersContainer.addEventListener('touchstart', function() {
      userInteracting = true;
      autoScrollEnabled = false;
      clearTimeout(interactionTimeout);
    });
    
    filtersContainer.addEventListener('touchmove', function() {
      userInteracting = true;
      autoScrollEnabled = false;
      currentScroll = filtersContainer.scrollLeft;
      clearTimeout(interactionTimeout);
    });
    
    filtersContainer.addEventListener('touchend', function() {
      userInteracting = false;
      // Riprendi scroll automatico dopo 3 secondi
      interactionTimeout = setTimeout(function() {
        if (!userInteracting) {
          autoScrollEnabled = true;
        }
      }, 3000);
    });
    
    filtersContainer.addEventListener('scroll', function() {
      if (!userInteracting) {
        currentScroll = filtersContainer.scrollLeft;
      }
    });
    
    // Avvia animazione
    let animationFrame;
    function animate() {
      autoScroll();
      animationFrame = requestAnimationFrame(animate);
    }
    animate();
  }
});
</script>
