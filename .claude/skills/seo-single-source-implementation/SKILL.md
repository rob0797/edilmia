---
name: seo-single-source-implementation
description: Implementa routing pubblico a source of truth unica per il sito Edilmia, eliminando route duplicate, accessi diretti ai template e path rotti sugli URL puliti.
---

# Obiettivo
Applicare una patch reale per imporre una sola source of truth pubblica per ogni pagina.

Regola finale desiderata:
- URL pubblico unico: /servizi
- routing interno: index.php?page=servizi
- pages/*.php solo template interni
- /?page=servizi reindirizza con 301 a /servizi
- accesso diretto a pages/*.php bloccato
- CSS, JS, immagini e layout sempre caricati correttamente passando da index.php

# Quando usarla
Usa questa skill quando:
- esiste già un audit strutturale del routing
- è stato confermato che le route pulite bypassano index.php
- l’obiettivo è eliminare URL pubblici duplicati
- si vuole una sola source of truth vera, non basata su canonical

# Input atteso
L'input deve includere:
- audit routing già fatto
- file coinvolti confermati
- elenco slug pubblici attivi
- conferma che index.php è il router corretto
- conferma che $BASE_PATH viene definito nel flusso corretto via index.php

# Regole obbligatorie
1. Unico entry point pubblico: index.php
2. Nessuna rewrite verso pages/*.php
3. Nessun accesso diretto pubblico ai template interni
4. /?page=X deve fare 301 verso /X
5. Tutti i link interni devono usare URL puliti
6. Nessuna duplicazione di logica tra query string e slug puliti
7. Nessun workaround con canonical per coprire URL duplicati
8. Patch chirurgiche, piccole e verificabili
9. Nessun refactor estraneo al routing/path/linking
10. Nessuna invenzione di slug o file non confermati

# Sequenza obbligatoria di lavoro
Implementa SEMPRE in questo ordine:

## STEP 1 — .htaccess
- correggi tutte le rewrite rules che puntano a pages/*.php
- instradale verso index.php?page=slug
- aggiungi eventuali slug mancanti confermati
- aggiungi redirect 301 da /?page=slug a /slug
- blocca accesso diretto a /pages/

## STEP 2 — Test del routing
Prima di toccare altri file, verifica logicamente che:
- /servizi
- /chi-siamo
- /gallery
- /contatti
- /policy
servano il layout completo tramite index.php

## STEP 3 — Fix strutturali minimi nei template
- correggi eventuali path hardcoded incoerenti
- non toccare i template se il problema è già risolto dal router

## STEP 4 — Link interni
- aggiorna navbar, footer e CTA interne
- sostituisci /?page=slug con /slug
- non lasciare link legacy interni che passano per redirect

## STEP 5 — Redirect applicativi
- aggiorna eventuali header('Location: .../?page=x')
- porta tutto al formato /slug

# Cosa analizzare durante la patch
Controlla esplicitamente:

## .htaccess
- rewrite per ogni slug esistente
- assenza di rewrite verso pages/*.php
- blocco /pages/
- redirect 301 query string -> slug
- ordine corretto delle regole

## index.php
- mapping corretto degli slug
- default home coerente
- definizione di $BASE_PATH
- include di head/navbar/footer/pages

## Template e componenti
- link interni legacy
- path asset hardcoded
- redirect legacy nei form

# Output richiesto
Restituisci SEMPRE nel seguente formato.

## Implementation Summary
- Obiettivo implementato:
- Strategia applicata:
- Source of truth finale:
- Rischio residuo:

## File modificati
- path/file.ext
- path/file.ext

## Modifiche applicate
| Step | File | Modifica | Motivo |
|------|------|----------|--------|

## Patch Notes
### 1. .htaccess
- ...

### 2. Routing
- ...

### 3. Link interni
- ...

### 4. Redirect applicativi
- ...

## Verifiche da eseguire
| Controllo | Metodo | Esito atteso |
|----------|--------|--------------|

## Regole finali da mantenere
- ...
- ...
- ...

# Modalità di output codice
Se l’utente chiede implementazione:
- fornisci file completi solo per file piccoli o centrali
- per file grandi usa blocchi REPLACE mirati
- indica sempre con precisione dove applicare la patch
- non omettere le regole .htaccess complete se sono il cuore della correzione

# Cose da NON fare
- Non usare canonical come sostituto della correzione routing
- Non lasciare vivi sia /?page=x sia /slug come URL pubblici equivalenti
- Non creare alias o doppie mappature incoerenti
- Non puntare mai le rewrite a pages/*.php
- Non correggere 20 template se il problema è solo nel router
- Non aggiornare i link interni prima di aver sistemato il routing
- Non usare path relativi fragili per asset
- Non introdurre nuove convenzioni miste

# Vincoli
- Soluzione esplicita e strutturale
- Nessun alias workaround
- Nessuna seconda source of truth
- Nessuna patch cosmetica SEO prima della stabilizzazione del routing