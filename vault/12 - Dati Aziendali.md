---
tags: [dati, nap, riferimento]
---

# 12 — Dati Aziendali (Single Source of Truth)

Dati anagrafici e di contatto dell'azienda. **Sono ripetuti in più punti del codice** — questa nota è il riferimento canonico per tenerli sincronizzati.

## Anagrafica
| Campo | Valore |
|---|---|
| Ragione sociale | **Edilmia di Gianni Marcon** |
| Brand | Edilmia |
| P.IVA | **04953100288** |
| Settore | Edilizia — scavi, costruzioni, ristrutturazioni, bioedilizia |
| Area servita | Veneto e dintorni |

## Sede (PostalAddress)
- **Via Rena n.73**
- **35025 Cartura** (PD)
- Regione: Veneto — Paese: IT
- **Geo:** lat `45.2185`, lon `11.9617`

## Contatti
| Canale | Valore |
|---|---|
| Telefono | **+39 348 373 2609** (`+393483732609` / `tel:3483732609`) |
| Email | **edilmia2016@gmail.com** |
| Email destinazione form | edilmia2016@gmail.com (vedi [[07 - Form Contatti]]) |

## Orari
Lunedì–Venerdì **08:30–18:30** (da `openingHoursSpecification` dello schema).

## Social
- Facebook: `facebook.com/edilmia.padova`
- Instagram: `instagram.com/edilmia.padova`

## Web
- Sito: **https://www.edilmiadigiannimarcon.it**
- Logo schema/header: `edilmia_logo_mix.png` · footer: `edilmia_logo_yellow.png`

> [!important] Dove vivono questi dati nel codice
> Se cambia un recapito, aggiorna **tutti** questi punti:
> - `index.php` → schema JSON-LD `Organization` + `LocalBusiness` (tel, email, indirizzo, geo, orari, social)
> - `components/footer.php` → telefono, email, P.IVA, social
> - `components/process_contact.php` → email destinatario (`$to`)
> - Eventuali menzioni in `pages/contatti.php` e `pages/chi-siamo.php`
>
> Riferimenti: [[05 - Componenti]] · [[06 - SEO e Structured Data]]

## Collegamenti
[[00 - Home]] · [[06 - SEO e Structured Data]] · [[07 - Form Contatti]]
