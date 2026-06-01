---
tags: [deploy, ambiente, xampp]
---

# 10 — Deploy e Ambiente

## Sviluppo locale (XAMPP, Windows)
- Percorso: `C:\xampp\htdocs\edilmia`
- URL locale tipico: `http://localhost/edilmia/` → qui `$BASE_PATH = '/edilmia'` (vedi [[02 - Architettura e Routing]])
- Serve Apache con `mod_rewrite`, `mod_expires`, `mod_mime` attivi (il `.htaccess` li usa)

> [!warning] Il form NON invia email in locale
> `mail()` su XAMPP non funziona senza un SMTP configurato. Per testare l'invio serve sendmail/MailHog o un test in produzione. Vedi [[07 - Form Contatti]].

## Produzione
- Dominio: **https://www.edilmiadigiannimarcon.it**
- Il sito vive nella **root** del dominio → `$BASE_PATH = ''`
- Deploy presumibilmente via **FTP/hosting condiviso** (nessun build step: si copiano i file così come sono)
- Requisiti hosting: PHP + Apache con `.htaccess` abilitato (AllowOverride) + `mail()` funzionante

## Checklist deploy
1. Verifica che tutti i link usino `$BASE_PATH` (no path assoluti hardcoded che rompono tra root e sottocartella)
2. Carica i file modificati (PHP/CSS/JS/immagini)
3. Se hai aggiunto pagine: aggiorna `sitemap.xml` e ripinga Search Console
4. Controlla che `.htaccess` sia stato caricato (file nascosto!)
5. Verifica HTTPS + redirect www attivo

## Niente di tutto questo
- ❌ Database — nessuna persistenza, i lead arrivano via email
- ❌ Composer / npm / node_modules
- ❌ Pipeline CI/CD o build
- ❌ Variabili d'ambiente applicative (`.env`) — non usate dal codice

## Collegamenti
[[00 - Home]] · [[02 - Architettura e Routing]] · [[07 - Form Contatti]] · [[11 - Sicurezza e Git]]
