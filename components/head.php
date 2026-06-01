<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($meta['title'], ENT_QUOTES, 'UTF-8') ?></title>
  <meta name="description" content="<?= htmlspecialchars($meta['description'], ENT_QUOTES, 'UTF-8') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= htmlspecialchars($meta['title'], ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:description" content="<?= htmlspecialchars($meta['description'], ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:url" content="<?= htmlspecialchars($meta['url'], ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:image" content="<?= htmlspecialchars($meta['og_image'], ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:locale" content="it_IT">
  <meta property="og:site_name" content="Edilmia">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($meta['title'], ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($meta['description'], ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($meta['og_image'], ENT_QUOTES, 'UTF-8') ?>">

  <link rel="canonical" href="<?= htmlspecialchars($meta['url'], ENT_QUOTES, 'UTF-8') ?>">

  <!-- Favicon -->
  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" type="image/svg+xml" href="/assets/icons/favicon.svg">
  <link rel="icon" type="image/png" sizes="96x96" href="/assets/icons/favicon-96x96.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-touch-icon.png">
  <link rel="manifest" href="/site.webmanifest">
  <meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" href="<?= $BASE_PATH ?>/assets/css/base.css">
  <link rel="stylesheet" href="<?= $BASE_PATH ?>/assets/css/desktop.css" media="screen and (min-width: 481px)">
  <link rel="stylesheet" href="<?= $BASE_PATH ?>/assets/css/mobile.css" media="screen and (max-width: 480px)">

  <!-- Structured Data -->
  <?php
    $schemas = ['@context' => 'https://schema.org', '@graph' => [$schemaOrganization, $schemaLocalBusiness, $schemaWebSite]];
    if ($schemaPageExtra !== null) {
        $schemas['@graph'][] = $schemaPageExtra;
    }
    echo '<script type="application/ld+json">' . json_encode($schemas, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
  ?>
</head>
