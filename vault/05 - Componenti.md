---
tags: [componenti, codice]
---

# 05 — Componenti

I file in `components/` sono inclusi da [[02 - Architettura e Routing|index.php]] e condividono le sue variabili (`$meta`, `$BASE_PATH`, gli `$schema*`). Non vanno aperti direttamente (bloccati via `robots.txt`; `process_contact.php` è invece un endpoint POST).

## `head.php`
Costruisce tutto il `<head>`. Stampa da `$meta` (impostato in `index.php`):
- `<title>`, `<meta description>`
- **Open Graph**: type, title, description, url, image, locale `it_IT`, site_name
- **Twitter Card**: `summary_large_image`
- `<link rel="canonical">` → `$meta['url']`
- Favicon (ico, svg, png 96, apple-touch 180), `manifest`, `theme-color`
- 3 fogli CSS: `base.css` sempre, `desktop.css` (min-width 481px), `mobile.css` (max-width 480px)
- **JSON-LD**: serializza `@graph` con Organization + LocalBusiness + WebSite (+ Service su servizi). Vedi [[06 - SEO e Structured Data]].

> [!important] Tutti i valori passano da `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')` → niente XSS via meta.

## `navbar.php`
Header con logo (`edilmia_logo_mix.png`) e menu. Voci: Home · Servizi · Progetti · **Azienda** (=chi-siamo) · **Contattaci** (bottone primario).
Include uno `<script>` IIFE inline che gestisce il menu mobile:
- toggle al click sull'hamburger (icona `menu` ⇄ `close`)
- chiusura al click fuori, al click su un link, e con **ESC**
- guardia `document.readyState` per init sia prima sia dopo `DOMContentLoaded`

## `footer.php`
- **Brand**: logo giallo + claim + link social (Facebook/Instagram `edilmia.padova`)
- **Link Rapidi**: chi-siamo, progetti, servizi, contatti
- **Sede Operativa**: area Veneto, telefono `348 373 2609`, email `edilmia2016@gmail.com`
- **Bottom**: `© <anno corrente> EDILMIA - P.IVA 04953100288` + link Privacy Policy
- Contiene il markup della **modale gallery globale** (`#galleryModal`) usata da [[08 - Gallery Progetti]]
- Carica `main.js` in fondo (`<script src=".../assets/js/main.js">`)

> [!note] Single source dei dati di contatto
> Telefono, email, social e P.IVA sono ripetuti in footer **e** nello schema JSON-LD di `index.php`. Se cambiano vanno aggiornati in entrambi. Riferimento unico: [[12 - Dati Aziendali]].

## `process_contact.php`
Handler del form contatti → trattato a parte in [[07 - Form Contatti]].

## Collegamenti
[[00 - Home]] · [[04 - Pagine del Sito]] · [[06 - SEO e Structured Data]] · [[12 - Dati Aziendali]]
