---
tags: [todo, roadmap, debito-tecnico]
---

# 99 — TODO e Roadmap

Idee di miglioramento e debiti tecnici emersi dalla documentazione. Non sono task pianificati: spunti da valutare.

## 🔧 Debito tecnico
- [ ] **CSS duplicato desktop/mobile** (~4900 righe in due fogli paralleli). Valutare un unico foglio responsive o un sistema con variabili/utility per ridurre la duplicazione. → [[09 - Asset e Design System]]
- [ ] **Catalogo gallery parziale**: solo ~6 immagini in `$metaByFile` hanno titolo/categoria curati. Completare i metadati per tutte le immagini in `assets/images/gallery/`. → [[08 - Gallery Progetti]]
- [ ] **Dati di contatto ripetuti** in footer + schema + handler form. Rischio di disallineamento. Valutare un unico file di config PHP (`config.php`) incluso ovunque. → [[12 - Dati Aziendali]]

## ✉️ Form contatti
- [ ] Passare da `mail()` a **SMTP autenticato (PHPMailer)** con `From` del dominio e `Reply-To` del cliente → meno spam, invio affidabile. → [[07 - Form Contatti]]
- [ ] Niente CAPTCHA: il solo honeypot potrebbe non bastare se aumenta lo spam. Valutare rate-limiting o token.
- [ ] Nessuna persistenza dei lead: valutare log/DB oltre all'email (backup richieste).

## 🔍 SEO
- [ ] `sitemap.xml` con `lastmod` fisso `2026-03-08`: automatizzare l'aggiornamento o tenerlo allineato alle modifiche reali. → [[06 - SEO e Structured Data]]
- [ ] Sfruttare le skill SEO del repo (`seo-audit`, `seo-patch-plan`) per un audit periodico.

## 🛡️ Sicurezza / Ops
- [ ] Aggiungere header di sicurezza in `.htaccess` (CSP, X-Content-Type-Options, Referrer-Policy, HSTS).
- [ ] Verificare invio email reale in produzione (deliverability, SPF/DKIM del dominio).

## 💡 Possibili evoluzioni
- [ ] Pagina/blocco recensioni con schema `Review`/`AggregateRating`.
- [ ] Sezione blog/news per contenuti SEO long-tail.
- [ ] Service worker per esperienza PWA reale (il manifest c'è già).

## Collegamenti
[[00 - Home]] · [[07 - Form Contatti]] · [[09 - Asset e Design System]] · [[06 - SEO e Structured Data]]
