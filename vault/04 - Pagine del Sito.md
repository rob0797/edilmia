---
tags: [pagine, contenuti]
---

# 04 — Pagine del Sito

Ogni pagina è un file in `pages/` incluso dentro `<main>` da [[02 - Architettura e Routing|index.php]], tra navbar e footer. Le pagine **non** contengono `<head>`/`<body>`: solo il contenuto della sezione.

## Le pagine
| Slug | File | Voce menu | Hero image |
|---|---|---|---|
| `home` | `home.php` | Home | `hero2.webp` |
| `chi-siamo` | `chi-siamo.php` | **Azienda** | `costruzioni.webp` |
| `servizi` | `servizi.php` | Servizi | `escavatore_in_azione.webp` |
| `progetti` | `progetti.php` | Progetti | `finiture_esterni.webp` (OG) |
| `contatti` | `contatti.php` | Contattaci | `costruzioni.webp` |
| `policy` | `policy.php` | (footer) | — (hero senza immagine) |
| `404` | inline in `index.php` | — | — |

> [!note] Attenzione al naming
> Nel menu la pagina `chi-siamo` è etichettata **"Azienda"**, non "Chi Siamo". Il footer invece la chiama "Chi Siamo". Stesso slug, due label.

## Note per pagina

### home
Hero a tutta pagina con `fetchpriority="high"` sull'immagine (ottimizzazione LCP). Contiene anteprime servizi con switcher JS (`.service-btn` → vedi [[09 - Asset e Design System]]).

### servizi
Hero + griglia servizi. È l'**unica pagina con schema JSON-LD extra** (`Service` + `OfferCatalog` con 3 offerte: Scavi e Fognature, Costruzioni e Ristrutturazioni, Bioedilizia). Vedi [[06 - SEO e Structured Data]].

### progetti
La più articolata: **gallery dinamica** con filtri per categoria e modale a schermo intero. Logica dedicata in [[08 - Gallery Progetti]].

### contatti
Contiene il form che invia a `process_contact.php`. Legge i query param `?sent=1` (successo) e `?error=...` per mostrare feedback. Vedi [[07 - Form Contatti]].

### policy
Privacy Policy GDPR (Reg. UE 2016/679). Hero **senza** immagine di sfondo (solo testo). `changefreq: yearly`, `priority: 0.3` in sitemap.

### 404
Non è un file: è un blocco HTML inline in `index.php` mostrato quando lo slug non è in whitelist. Imposta correttamente `http_response_code(404)` e offre un link "Torna alla Home".

## Collegamenti
[[00 - Home]] · [[05 - Componenti]] · [[08 - Gallery Progetti]] · [[07 - Form Contatti]]
