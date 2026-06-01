---
tags: [panoramica]
---

# 01 — Panoramica Progetto

## Cos'è
Sito **vetrina aziendale** per **Edilmia di Gianni Marcon**, impresa edile del Veneto specializzata in scavi e fognature, costruzioni, ristrutturazioni chiavi in mano e bioedilizia. Obiettivo del sito: presentare l'azienda, mostrare i lavori realizzati e **raccogliere richieste di sopralluogo** tramite il form contatti.

## Stack tecnologico
| Livello | Tecnologia |
|---|---|
| Linguaggio server | **PHP** (vanilla, nessun framework) |
| Web server | **Apache** (ambiente di sviluppo: **XAMPP** su Windows) |
| Frontend | HTML server-rendered, **CSS puro** (3 file: base/desktop/mobile), **JavaScript vanilla** |
| Dipendenze | **Nessuna** (no Composer, no npm, no node_modules) |
| Persistenza | Nessun database — i form arrivano via email con `mail()` |

> [!note] Filosofia
> Progetto volutamente **minimale e senza build step**: si modifica un file PHP/CSS e si carica via FTP. Niente toolchain, niente compilazione. Vedi [[10 - Deploy e Ambiente]].

## Caratteristiche chiave
- **Single entry point** + router whitelist → vedi [[02 - Architettura e Routing]]
- **URL puliti** (`/servizi` invece di `?page=servizi`) con redirect 301 dal legacy
- **SEO-first**: meta per pagina, Open Graph, Twitter Card, JSON-LD multiplo → [[06 - SEO e Structured Data]]
- **Gallery progetti dinamica**: legge le immagini dalla cartella, niente hardcoding → [[08 - Gallery Progetti]]
- **Form contatti** con honeypot anti-bot, sanitizzazione e consenso GDPR → [[07 - Form Contatti]]
- **Responsive** con CSS separato desktop/mobile via media query

## Pagine pubbliche
`home` · `chi-siamo` (menu: "Azienda") · `servizi` · `progetti` · `contatti` · `policy`
Più una **404** gestita internamente. Dettagli in [[04 - Pagine del Sito]].

## Collegamenti
[[00 - Home]] · [[02 - Architettura e Routing]] · [[12 - Dati Aziendali]]
