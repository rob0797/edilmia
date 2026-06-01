---
tags: [moc, indice]
---

# 🏗️ Edilmia — Vault di Progetto

Mappa dei contenuti (MOC) del sito **Edilmia di Gianni Marcon**, impresa edile attiva nel Veneto. Questo vault documenta tutto ciò che serve sapere per capire, manutenere ed estendere il sito.

> [!info] In una riga
> Sito vetrina in **PHP "vanilla"** (senza framework) servito da **Apache/XAMPP**, con un unico entry point (`index.php`), URL puliti via `.htaccess` e forte attenzione alla **SEO** (meta per pagina + JSON-LD).

## 🗺️ Indice

### Fondamentali
- [[01 - Panoramica Progetto]] — cos'è, stack, a chi serve
- [[02 - Architettura e Routing]] — entry point, router, `.htaccess`
- [[03 - Struttura File]] — mappa cartelle e file

### Codice
- [[04 - Pagine del Sito]] — le 6 pagine + 404
- [[05 - Componenti]] — head, navbar, footer
- [[07 - Form Contatti]] — `process_contact.php`
- [[08 - Gallery Progetti]] — gallery dinamica + modale

### Contorno
- [[06 - SEO e Structured Data]] — meta, OG, JSON-LD, sitemap
- [[09 - Asset e Design System]] — CSS, font, immagini, JS
- [[10 - Deploy e Ambiente]] — XAMPP, hosting, base path
- [[11 - Sicurezza e Git]] — segreti, `.gitignore`, history
- [[12 - Dati Aziendali]] — NAP, P.IVA, social (single source of truth)
- [[99 - TODO e Roadmap]] — debiti tecnici e idee

## 🚀 Quick reference
- **URL produzione:** https://www.edilmiadigiannimarcon.it
- **Repo:** github.com/rob0797/edilmia
- **Pagine valide:** `home`, `chi-siamo`, `servizi`, `progetti`, `contatti`, `policy`
- **Contatti business:** vedi [[12 - Dati Aziendali]]
