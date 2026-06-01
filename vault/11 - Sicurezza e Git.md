---
tags: [sicurezza, git]
---

# 11 — Sicurezza e Git

## Repository
- Remote: **github.com/rob0797/edilmia.git** (`origin`)
- Branch principale locale: `master`
- Stato: il commit pubblicato è **pulito** (senza segreti)

## ⚠️ Incidente segreto (risolto)
All'inizio erano tracciati su git due file con dati locali/sensibili:
- `.cursor/mcp.json` → conteneva una **Google API key in chiaro** (`X-Goog-Api-Key`)
- `.claude/settings.local.json` → config locale

**Risoluzione applicata:**
1. Creato `.gitignore` che esclude i due file (+ log, temp, file OS, editor, vendor/node_modules)
2. `git rm --cached` per smettere di tracciarli (restano sul disco, funzionanti)
3. `git commit --amend` sul commit iniziale → il segreto **non compare in nessun commit** della history
4. Verificato con `git grep` su tutta la history: zero occorrenze della chiave

> [!success] Esito
> Poiché il segreto non è mai arrivato al remote (il push contiene già il commit amendato `38cc32c`), **non è stato necessario revocare la API key**. Se in futuro un segreto venisse pushato, andrebbe **revocato/rigenerato**, non basta rimuoverlo.

## Regola d'oro
> [!danger] Mai committare segreti
> Niente API key, password, token o config locale nel repo. Se serve configurazione sensibile, tienila in file ignorati (`.env`, `*.local.json`) e fuori dal versionamento. Controlla sempre `git status` prima di committare.

## Cosa è ignorato (`.gitignore`)
`.cursor/mcp.json`, `.claude/settings.local.json`, `*.env`, `*.log`, file temp/cache, file OS (Thumbs.db, .DS_Store), editor (.vscode, *.swp, *.bak), `/vendor/`, `/node_modules/`, e i file locali del vault Obsidian (`vault/.obsidian/workspace*`).

## Cosa è volutamente tracciato
**Tutti gli asset**: immagini, loghi, font, favicon, gallery. Sono contenuti del sito, devono stare su git. Vedi [[09 - Asset e Design System]].

## Sicurezza applicativa (lato codice)
- **XSS**: ogni output passa da `htmlspecialchars(ENT_QUOTES, UTF-8)` (meta, form, 404)
- **Input form**: sanitizzati + validati in [[07 - Form Contatti]]
- **Accesso diretto template**: `pages/` bloccato via `.htaccess` (`[F,L]`) e `robots.txt`
- **Honeypot** anti-bot sul form
- **HTTPS** forzato + non-www→www in `.htaccess`

## Collegamenti
[[00 - Home]] · [[10 - Deploy e Ambiente]] · [[07 - Form Contatti]]
