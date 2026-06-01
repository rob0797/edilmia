---
tags: [css, js, asset, design]
---

# 09 — Asset e Design System

## CSS — strategia "3 file per media query"
Caricati in [[05 - Componenti|head.php]]:
| File | Righe | Quando |
|---|---|---|
| `base.css` | 288 | sempre (reset, variabili CSS, regole comuni) |
| `desktop.css` | 2389 | `media screen and (min-width: 481px)` |
| `mobile.css` | 2490 | `media screen and (max-width: 480px)` |

> [!warning] Duplicazione desktop/mobile
> desktop e mobile sono **due fogli quasi paralleli** (~4900 righe totali). Una modifica visiva spesso va replicata in entrambi. È il principale costo di manutenzione del frontend. Possibile rifattorizzazione futura → [[99 - TODO e Roadmap]].

## Font (self-hosted in `assets/fonts/`)
- **Inter** (woff2): pesi 400/600/700/800 — testo
- **Oswald** (woff2): pesi 500/700 — titoli/display
- **Material Icons** (ttf): icone UI (menu, close, chevron, ecc.)

I MIME `woff2`/`ttf` sono dichiarati in `.htaccess` (`AddType`). Self-hosting = niente chiamate a Google Fonts (privacy + performance).

## JavaScript (`assets/js/main.js`, 203 righe)
Vanilla JS, nessuna libreria. Responsabilità:
1. **Service preview switcher** (`.service-btn`) — cambia immagine/titolo/descrizione servizio al click (`dataset.img/title/desc`)
2. **Touch hover** per `.servizio-card` su mobile (simula `:hover` con `touchstart`)
3. **Gallery modale** — apertura/navigazione/chiusura (vedi [[08 - Gallery Progetti]])

Il toggle del **menu mobile** sta invece inline in [[05 - Componenti|navbar.php]], non in main.js.

## Immagini (`assets/images/`)
- Formato **WebP** per hero e servizi (`hero2`, `costruzioni`, `scavi`, `escavatore_in_azione`, `finiture_esterni`, `fognature`, `fondazioni`, ...). Diversi hanno la coppia `_risultato`.
- `logo/`: `edilmia_logo_mix.png` (header), `edilmia_logo_yellow.png` (footer)
- `gallery/`: immagini progetti (caricamento dinamico)
- Hero con `width/height` espliciti + `fetchpriority="high"` + `decoding="async"` → buon LCP / no layout shift

## Icone & PWA (`assets/icons/`)
favicon `.ico/.svg/.png 96`, `apple-touch-icon` 180, `web-app-manifest-192/512`. Referenziati da `site.webmanifest` (display `standalone`, theme `#ffffff`).

## Collegamenti
[[00 - Home]] · [[03 - Struttura File]] · [[08 - Gallery Progetti]]
