---
tags: [form, contatti, php]
---

# 07 — Form Contatti

Handler: `components/process_contact.php`. Il form sta in [[04 - Pagine del Sito|pages/contatti.php]] e fa **POST** a questo endpoint.

## Flusso
```
contatti (form POST) → process_contact.php
   ├─ honeypot "website" pieno? → silent redirect /contatti?sent=1  (bot)
   ├─ sanitizza input (trim + stripslashes + htmlspecialchars)
   ├─ valida (campi, lunghezze, email, consenso privacy)
   ├─ errori?  → redirect /contatti?error=<messaggi>
   └─ ok       → mail() → redirect /contatti?sent=1
```
`pages/contatti.php` legge `?sent=1` / `?error=...` per mostrare il feedback.

## Anti-spam: honeypot
Campo nascosto `website`: se valorizzato è un bot → **silent fail** (finge successo, non invia nulla). Niente CAPTCHA.

## Validazione
| Campo | Regole |
|---|---|
| `name` | obbligatorio, ≤ 80 char |
| `email` | obbligatoria, `FILTER_VALIDATE_EMAIL`, ≤ 100 char |
| `message` | obbligatorio, ≤ 2000 char |
| `phone` | opzionale, ≤ 40 char |
| `type` | opzionale (tipo intervento) |
| `privacy` | checkbox **obbligatoria** (consenso GDPR) |

`sanitizeInput()` = `trim` + `stripslashes` + `htmlspecialchars(ENT_QUOTES, UTF-8)`.

## Invio email
- **Destinatario:** `edilmia2016@gmail.com`
- **Subject:** `Richiesta Sopralluogo - <nome>`
- **Body:** nome, email, telefono, tipo intervento, messaggio + **data/ora consenso privacy** (`date('d/m/Y H:i:s')`)
- **Headers:** `From`/`Reply-To` = email del mittente, content-type text/plain UTF-8
- Funzione: **PHP `mail()`** nativa

> [!warning] Punto fragile: `mail()`
> `mail()` dipende dal mail server configurato sull'hosting. **In locale (XAMPP) non invia** senza un SMTP configurato (es. sendmail/MailHog). In produzione può finire in spam perché `From` usa il dominio del visitatore, non quello del sito. Miglioria possibile: passare a SMTP autenticato (PHPMailer) con `From` del dominio e `Reply-To` del cliente. Vedi [[99 - TODO e Roadmap]].

> [!note] GDPR
> Il consenso privacy è obbligatorio e viene **timestampato nel corpo dell'email** come prova. La pagina `policy` contiene l'informativa completa.

## Collegamenti
[[00 - Home]] · [[04 - Pagine del Sito]] · [[12 - Dati Aziendali]] · [[99 - TODO e Roadmap]]
