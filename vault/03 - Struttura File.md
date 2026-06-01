---
tags: [struttura, riferimento]
---

# 03 — Struttura File

```
edilmia/
├── index.php              ← entry point + router + SEO meta + JSON-LD
├── .htaccess              ← rewrite URL puliti, redirect, cache, MIME
├── robots.txt             ← Allow tutto, Disallow /components/ e /pages/
├── sitemap.xml            ← 6 URL pubblici
├── site.webmanifest       ← PWA manifest (nome, icone, theme)
├── favicon.ico
│
├── components/            ← parti riusabili incluse da index.php
│   ├── head.php           ← <head>: meta, OG, Twitter, favicon, CSS, JSON-LD
│   ├── navbar.php         ← header + menu + JS toggle mobile
│   ├── footer.php         ← footer + modale gallery + <script> main.js
│   └── process_contact.php← handler POST del form contatti
│
├── pages/                 ← contenuto delle singole pagine (accesso diretto BLOCCATO)
│   ├── home.php
│   ├── chi-siamo.php
│   ├── servizi.php
│   ├── progetti.php       ← gallery dinamica (scandir + catalogo metadati)
│   ├── contatti.php
│   └── policy.php
│
├── assets/
│   ├── css/
│   │   ├── base.css       (288 righe)  ← reset, variabili, comune
│   │   ├── desktop.css    (2389 righe) ← media min-width 481px
│   │   └── mobile.css     (2490 righe) ← media max-width 480px
│   ├── js/
│   │   └── main.js        (203 righe)  ← switcher servizi, gallery, touch
│   ├── fonts/             ← Inter, Oswald, Material Icons (self-hosted)
│   ├── icons/             ← favicon varianti + manifest icons
│   └── images/
│       ├── *.webp         ← hero e immagini servizi
│       ├── logo/          ← edilmia_logo_mix.png, edilmia_logo_yellow.png
│       └── gallery/       ← immagini progetti (lette dinamicamente)
│
└── vault/                 ← QUESTA documentazione (vault Obsidian)
```

> [!note] File generati / locali (non su git)
> `.cursor/mcp.json`, `.claude/settings.local.json` e `vault/.obsidian/workspace*` sono esclusi dal versionamento. Vedi [[11 - Sicurezza e Git]].

## Conteggio righe (per stimare la "massa")
- `pages/progetti.php` → 341 (la più complessa, per la gallery)
- `pages/contatti.php` → 174 · `chi-siamo` 164 · `servizi` 155 · `policy` 149 · `home` 115
- CSS desktop+mobile ≈ **4900 righe** (il grosso del peso di manutenzione è qui)

## Collegamenti
[[00 - Home]] · [[02 - Architettura e Routing]] · [[09 - Asset e Design System]]
