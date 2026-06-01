---
tags: [seo, jsonld, meta]
---

# 06 — SEO e Structured Data

La SEO è centralizzata in `index.php` e renderizzata da [[05 - Componenti|head.php]].

## Meta per pagina (`$pageMeta`)
Array associativo in `index.php`: per ogni slug definisce `title`, `description`, `og_image`, `url`. Esempio:
```php
'servizi' => [
  'title'       => 'Servizi Edili | Edilmia — Scavi, Costruzioni e Bioedilizia',
  'description' => 'Scavi e fognature, edilizia civile, ristrutturazioni ...',
  'og_image'    => $siteUrl . '/assets/images/scavi.webp',
  'url'         => $siteUrl . '/servizi',
],
```
`$siteUrl = 'https://www.edilmiadigiannimarcon.it'`. Fallback `$ogImageDefault = hero2.webp`.

> [!tip] Per aggiungere una pagina ricordati la voce in `$pageMeta`, altrimenti eredita il fallback generico. Checklist completa in [[02 - Architettura e Routing]].

## Tag generati (in head.php)
- `<title>` + `<meta description>`
- Open Graph completo (type/title/description/url/image/locale/site_name)
- Twitter Card `summary_large_image`
- `<link rel="canonical">` per pagina
- Favicon multi-formato + `site.webmanifest` + `theme-color`

## JSON-LD (`@graph`)
`head.php` emette uno script `application/ld+json` con un `@graph` che contiene **sempre**:

### 1. Organization (`#organization`)
name, url, logo (`edilmia_logo_mix.png`), email, telephone `+393483732609`, description, `sameAs` (Facebook + Instagram).

### 2. LocalBusiness (`#localbusiness`)
`parentOrganization` → Organization. Include:
- **address** (PostalAddress): Via Rena n.73, Cartura, Veneto, 35025, IT
- **geo**: lat `45.2185`, lon `11.9617`
- **areaServed**: Veneto
- **openingHours**: Lun–Ven 08:30–18:30
- `priceRange: "$$"`

### 3. WebSite (`#website`)
url, name, description, `publisher` → Organization, `inLanguage: it-IT`.

### 4. Service (solo pagina `servizi`)
`$schemaPageExtra` aggiunto al graph solo se `$page === 'servizi'`. Contiene un `OfferCatalog` con 3 `Offer`/`Service`:
1. **Scavi e Fognature**
2. **Costruzioni e Ristrutturazioni**
3. **Bioedilizia e Isolamento Termico**

> [!note] I dati anagrafici nello schema sono la copia "macchina-leggibile" di [[12 - Dati Aziendali]]. Tenerli sincronizzati con footer e contatti.

## File SEO di supporto
- **`robots.txt`**: `Allow: /`, `Disallow: /components/` e `/pages/`, riga `Sitemap:`
- **`sitemap.xml`**: 6 URL (home priority 1.0, interne 0.7, policy 0.3), `lastmod 2026-03-08`
- **Canonicalizzazione**: non-www→www e 301 da `?page=` (in `.htaccess`) evitano duplicati

## Skill SEO disponibili
Nel repo (`.claude/skills/`) ci sono skill SEO dedicate al progetto: `seo-audit`, `seo-meta`, `seo-schema`, `seo-internal-linking`, `seo-patch-plan`, `seo-single-source-*`. Utili per audit e patch mirate.

## Collegamenti
[[00 - Home]] · [[05 - Componenti]] · [[02 - Architettura e Routing]] · [[12 - Dati Aziendali]]
