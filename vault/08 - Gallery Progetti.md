---
tags: [gallery, progetti, php, js]
---

# 08 — Gallery Progetti

Implementata in `pages/progetti.php` (PHP, lato server) + modale in [[05 - Componenti|footer.php]] + interazioni in [[09 - Asset e Design System|main.js]].

## Come carica le immagini (dinamico)
`progetti.php` fa `scandir()` su `assets/images/gallery/` e tiene solo le estensioni ammesse (`webp, jpg, jpeg, png, gif`), poi `sort(SORT_NATURAL | SORT_FLAG_CASE)`.

> [!tip] Aggiungere un progetto
> Basta **caricare l'immagine** in `assets/images/gallery/`: appare in automatico. Per dargli titolo/categoria/descrizione, aggiungi una voce in `$metaByFile` usando il **nome file esatto** come chiave.

## Catalogo metadati (`$metaByFile`)
Mappa `nomefile.webp → [ title, meta, desc, cat ]`. Esempio:
```php
'488257596_...n.webp' => [
  'title' => 'Preparazione area di cantiere',
  'meta'  => 'Padova | Costruzioni',
  'desc'  => 'Allestimento e predisposizione area ...',
  'cat'   => 'costruzioni'
],
```
Le immagini **senza** metadati vengono comunque mostrate (con fallback), ma senza categoria/titolo curati. Attualmente sono catalogate le prime ~6 immagini.

## Categorie / filtri (`$categorie`)
`TUTTI`, `SCAVI` (Scavi & Fognature), `DEMOLIZIONI`, `RISTRUTTURAZIONI`, `COSTRUZIONI`, `BIOEDILIZIA` (Bioedilizia & Isolamento). Il campo `cat` di ogni immagine deve combaciare (in minuscolo) con queste chiavi per il filtraggio.

## Modale (lightbox)
Markup `#galleryModal` in `footer.php`: immagine grande, titolo, contatore (es. "3 / 12"), frecce prev/next, chiusura. Le interazioni (apertura, navigazione, ESC, swipe) sono in `main.js`. Icone via **Material Icons** (`chevron_left`, `chevron_right`, `close`).

## File coinvolti
- `pages/progetti.php` — scansione, catalogo, render griglia + filtri
- `components/footer.php` — markup modale globale
- `assets/js/main.js` — logica modale + filtri
- `assets/images/gallery/*` — le immagini (tracciate su git, vedi [[11 - Sicurezza e Git]])

## Collegamenti
[[00 - Home]] · [[04 - Pagine del Sito]] · [[09 - Asset e Design System]]
