<?php
// Base path per asset e link: vuoto in root, '/edilmia' in sottocartella (es. localhost)
$basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$BASE_PATH = ($basePath === '/' || $basePath === '') ? '' : $basePath;

// ===== Router semplice =====
function getRequestedPage() {
    $allowed = ['home', 'chi-siamo', 'servizi', 'progetti', 'contatti', 'policy'];
    $page = $_GET['page'] ?? 'home';
    $page = strtolower(trim($page));
    if (in_array($page, $allowed)) {
        return $page;
    }
    // Slug non valido: segnala 404 con valore sentinel
    return null;
}
$page = getRequestedPage();
$is404 = ($page === null);
if ($is404) {
    http_response_code(404);
    $page = '404';
}

// ===== Metadata SEO per pagina =====
$siteUrl = 'https://www.edilmiadigiannimarcon.it';
$ogImageDefault = $siteUrl . '/assets/images/hero2.webp';

$pageMeta = [
    'home' => [
        'title'       => 'Edilmia | Costruzioni e Ristrutturazioni di Qualità Garantita',
        'description' => 'Edilmia di Gianni Marcon: ristrutturazioni chiavi in mano, scavi, costruzioni e bioedilizia nel Veneto. Preventivi blindati, referente unico, qualità certificata.',
        'og_image'    => $ogImageDefault,
        'url'         => $siteUrl . '/',
    ],
    'chi-siamo' => [
        'title'       => 'Chi Siamo | Edilmia — Esperienza e Qualità nel Veneto',
        'description' => 'Conosci Edilmia di Gianni Marcon: storia, valori e metodo di lavoro. Maestranze qualificate, macchinari propri e gestione completa del cantiere.',
        'og_image'    => $siteUrl . '/assets/images/costruzioni.webp',
        'url'         => $siteUrl . '/chi-siamo',
    ],
    'servizi' => [
        'title'       => 'Servizi Edili | Edilmia — Scavi, Costruzioni e Bioedilizia',
        'description' => 'Scavi e fognature, edilizia civile, ristrutturazioni chiavi in mano e bioedilizia nel Veneto. Supporto fiscale completo su bonus e detrazioni.',
        'og_image'    => $siteUrl . '/assets/images/scavi.webp',
        'url'         => $siteUrl . '/servizi',
    ],
    'progetti' => [
        'title'       => 'Progetti Realizzati | Edilmia — Portfolio Cantieri',
        'description' => 'Guarda i cantieri e le ristrutturazioni completate da Edilmia nel Veneto. Scavi, costruzioni, bioedilizia: risultati reali e qualità garantita in ogni progetto.',
        'og_image'    => $siteUrl . '/assets/images/finiture_esterni.webp',
        'url'         => $siteUrl . '/progetti',
    ],
    'contatti' => [
        'title'       => 'Contatti | Edilmia — Richiedi un Sopralluogo',
        'description' => 'Contatta Edilmia di Gianni Marcon per un preventivo gratuito. Telefono, email o modulo online: rispondiamo velocemente per ogni intervento nel Veneto.',
        'og_image'    => $ogImageDefault,
        'url'         => $siteUrl . '/contatti',
    ],
    'policy' => [
        'title'       => 'Privacy Policy | Edilmia',
        'description' => 'Informativa sul trattamento dei dati personali di Edilmia di Gianni Marcon, ai sensi del Regolamento UE 2016/679 (GDPR).',
        'og_image'    => $ogImageDefault,
        'url'         => $siteUrl . '/policy',
    ],
    '404' => [
        'title'       => 'Pagina non trovata | Edilmia',
        'description' => 'La pagina che cerchi non esiste. Torna alla home di Edilmia per trovare informazioni su costruzioni e ristrutturazioni nel Veneto.',
        'og_image'    => $ogImageDefault,
        'url'         => $siteUrl . '/',
    ],
];

$meta = $pageMeta[$page] ?? [
    'title'       => 'Edilmia | Costruzioni e Ristrutturazioni',
    'description' => 'Edilmia di Gianni Marcon: ristrutturazioni e costruzioni di qualità nel Veneto.',
    'og_image'    => $ogImageDefault,
    'url'         => $siteUrl . '/',
];

// ===== Structured Data JSON-LD =====
$schemaOrganization = [
    '@type'       => 'Organization',
    '@id'         => $siteUrl . '/#organization',
    'name'        => 'Edilmia',
    'url'         => $siteUrl . '/',
    'logo'        => $siteUrl . '/assets/images/logo/edilmia_logo_mix.png',
    'email'       => 'edilmia2016@gmail.com',
    'telephone'   => '+393483732609',
    'description' => 'Edilmia di Gianni Marcon: ristrutturazioni chiavi in mano, scavi, costruzioni e bioedilizia nel Veneto.',
    'sameAs'      => [
        'https://www.facebook.com/edilmia.padova',
        'https://www.instagram.com/edilmia.padova',
    ],
];

$schemaLocalBusiness = [
    '@type'       => 'LocalBusiness',
    '@id'         => $siteUrl . '/#localbusiness',
    'name'        => 'Edilmia di Gianni Marcon',
    'url'         => $siteUrl . '/',
    'telephone'   => '+393483732609',
    'email'       => 'edilmia2016@gmail.com',
    'priceRange'  => '$$',
    'parentOrganization' => ['@id' => $siteUrl . '/#organization'],
    'address'     => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => 'Via Rena n.73',
        'addressLocality' => 'Cartura',
        'addressRegion'   => 'Veneto',
        'postalCode'      => '35025',
        'addressCountry'  => 'IT',
    ],
    'geo'         => [
        '@type'     => 'GeoCoordinates',
        'latitude'  => 45.2185,
        'longitude' => 11.9617,
    ],
    'areaServed'  => [
        '@type' => 'AdministrativeArea',
        'name'  => 'Veneto',
    ],
    'openingHoursSpecification' => [
        [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'],
            'opens'     => '08:30',
            'closes'    => '18:30',
        ],
    ],
];

$schemaWebSite = [
    '@type'           => 'WebSite',
    '@id'             => $siteUrl . '/#website',
    'url'             => $siteUrl . '/',
    'name'            => 'Edilmia',
    'description'     => 'Costruzioni e ristrutturazioni di qualità nel Veneto.',
    'publisher'       => ['@id' => $siteUrl . '/#organization'],
    'inLanguage'      => 'it-IT',
];

$schemaPageExtra = null;
if ($page === 'servizi') {
    $schemaPageExtra = [
        '@type'           => 'Service',
        '@id'             => $siteUrl . '/servizi#service',
        'name'            => 'Servizi Edili Edilmia',
        'url'             => $siteUrl . '/servizi',
        'provider'        => ['@id' => $siteUrl . '/#organization'],
        'areaServed'      => 'Veneto, Italia',
        'serviceType'     => 'Edilizia e Ristrutturazioni',
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name'  => 'Servizi Edilmia',
            'itemListElement' => [
                [
                    '@type'       => 'Offer',
                    'itemOffered' => [
                        '@type'       => 'Service',
                        'name'        => 'Scavi e Fognature',
                        'description' => 'Scavi per fondazioni, impianti fognari e trincee tecniche con parco macchine di proprietà.',
                    ],
                ],
                [
                    '@type'       => 'Offer',
                    'itemOffered' => [
                        '@type'       => 'Service',
                        'name'        => 'Costruzioni e Ristrutturazioni',
                        'description' => 'Costruzioni residenziali in muratura e legno, ristrutturazioni chiavi in mano con gestione pratiche edilizie e bonus fiscali.',
                    ],
                ],
                [
                    '@type'       => 'Offer',
                    'itemOffered' => [
                        '@type'       => 'Service',
                        'name'        => 'Bioedilizia e Isolamento Termico',
                        'description' => 'Isolamento termico a cappotto, materiali bio-compatibili e consulenza su Bonus Ristrutturazioni fino al 50%.',
                    ],
                ],
            ],
        ],
    ];
}

$componentDir = __DIR__ . '/components/';
$pageDir = __DIR__ . '/pages/';
?>
<!DOCTYPE html>
<html lang="it">
<?php include $componentDir . 'head.php'; ?>
<body>
<?php include $componentDir . 'navbar.php'; ?>
<main>
<?php
  if ($is404) {
      echo "<section style='text-align:center;padding:5rem 1rem;'><h1>Pagina non trovata</h1><p>La pagina che cerchi non esiste.</p><p style='margin-top:1.5rem;'><a href='" . htmlspecialchars($BASE_PATH . '/', ENT_QUOTES, 'UTF-8') . "' class='btn btn-primary'>Torna alla Home</a></p></section>";
  } else {
      $pageFile = $pageDir . $page . '.php';
      if (file_exists($pageFile)) {
          include $pageFile;
      }
  }
?>
</main>
<?php include $componentDir . 'footer.php'; ?>
</body>
</html>
