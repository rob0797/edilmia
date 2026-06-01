---
tags: [architettura, routing]
---

# 02 — Architettura e Routing

## Flusso di una richiesta
```
Browser → /servizi
   │
   ▼
.htaccess  ── riscrive ──► index.php?page=servizi
   │
   ▼
index.php  ── router whitelist ──► $page = "servizi"
   │           ├─ costruisce $meta[...] (SEO)
   │           └─ costruisce schema JSON-LD
   ▼
include components/head.php
include components/navbar.php
include pages/servizi.php      ◄── contenuto della pagina
include components/footer.php
```

Tutto passa da **un solo entry point**: `index.php`. Le pagine in `pages/` non sono mai chiamate direttamente (l'accesso diretto è bloccato — vedi sotto).

## Il router (`index.php`)
Funzione `getRequestedPage()`:
- Whitelist: `['home', 'chi-siamo', 'servizi', 'progetti', 'contatti', 'policy']`
- Default `home` se manca `?page=`
- Slug non in whitelist → ritorna `null` → **404** con `http_response_code(404)` e template inline.

```php
$page = getRequestedPage();
$is404 = ($page === null);
if ($is404) { http_response_code(404); $page = '404'; }
```

> [!tip] Aggiungere una pagina nuova
> 1. Crea `pages/nuovo-slug.php`
> 2. Aggiungi `nuovo-slug` alla whitelist in `index.php`
> 3. Aggiungi la voce in `$pageMeta` (SEO) — vedi [[06 - SEO e Structured Data]]
> 4. Aggiungi le regole rewrite in `.htaccess` (route pulita + eventuale redirect legacy)
> 5. Aggiungi l'URL in `sitemap.xml` e i link in [[05 - Componenti]] (navbar/footer)

## `$BASE_PATH` — il dettaglio che confonde
```php
$basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$BASE_PATH = ($basePath === '/' || $basePath === '') ? '' : $basePath;
```
- In **produzione** (sito in root del dominio) → `$BASE_PATH = ''`
- In **locale** (es. `localhost/edilmia/`) → `$BASE_PATH = '/edilmia'`

Tutti i link interni e gli asset usano `<?= $BASE_PATH ?>/...` così il sito funziona sia in root sia in sottocartella. È definito anche in `process_contact.php` per i redirect.

## `.htaccess` — regole principali
| Regola | Scopo |
|---|---|
| non-www → www | Redirect 301 verso `www.` (canonicalizzazione) |
| `RewriteRule ^pages/ - [F,L]` | **403** sull'accesso diretto ai template interni |
| `RewriteCond REQUEST_FILENAME -f / -d` | Serve asset/file reali senza riscrittura |
| `?page=slug → /slug` | Redirect **301** dagli URL legacy (no contenuti duplicati) |
| `^servizi/?$ → index.php?page=servizi` | Route pulite verso l'entry point |
| `mod_expires` | Cache lunga per immagini (1 anno), CSS/JS (1 mese) |
| `AddType` woff2/ttf | MIME corretto per i font |

> [!warning] Coerenza SEO
> La combo "blocca `/pages/`" + "301 da `?page=`" + "canonical per pagina" serve a garantire **un solo URL pubblico per ogni pagina**. Non introdurre nuovi modi di raggiungere la stessa pagina senza canonical/redirect.

## Collegamenti
[[00 - Home]] · [[03 - Struttura File]] · [[06 - SEO e Structured Data]] · [[10 - Deploy e Ambiente]]
