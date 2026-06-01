---
name: seo-single-source-routing
description: Elimina URL duplicati e accessi diretti incoerenti, imponendo un solo URL pubblico per pagina e un solo entry point applicativo.
---

# Obiettivo
Portare il sito a una sola source of truth per ogni pagina pubblica.

Esempio corretto:
- pubblico: /servizi
- interno: index.php?page=servizi
- vietato: pages/servizi.php accessibile direttamente
- da redirigere: /?page=servizi -> /servizi

La pagina deve sempre essere servita dal router centrale, con layout completo, CSS corretto e asset coerenti.

# Quando usarla
Usa questa skill quando:
- una pagina esiste sia come query string sia come URL pulito
- gli URL puliti aprono pagine senza CSS o layout
- alcune route bypassano index.php
- esistono più modi pubblici per raggiungere la stessa pagina
- vuoi una sola source of truth reale, non cosmetica

# Principi obbligatori
1. Un solo entry point pubblico: index.php
2. Un solo formato URL pubblico per pagina
3. Nessun include o rewrite diretto verso pages/*.php
4. Nessun accesso pubblico a file template interni
5. Gli asset devono funzionare identici da tutte le pagine pubbliche
6. Prima si corregge il routing, poi il resto SEO

# Cosa devi analizzare
Analizza e verifica:

## Routing
- come vengono risolte le route pubbliche
- se .htaccess punta a index.php oppure a pages/*.php
- se esistono rewrite incomplete o incoerenti
- se /servizi e /?page=servizi servono la stessa pagina
- se /pages/qualcosa.php è accessibile direttamente

## Layout / template
- come index.php include head, header, footer e pages/*
- quali variabili globali o page-level servono al layout
- se pages/*.php dipendono dal router per funzionare

## Asset / CSS / JS
- come vengono costruiti i path CSS/JS/immagini
- se i path sono relativi e quindi si rompono su /servizi
- se serve BASE_URL o path assoluto coerente
- se ci sono src o href hardcoded inconsistenti

## Redirect / unicità URL
- se /?page=servizi deve essere rediretto a /servizi
- se esistono slug mancanti
- se esistono eccezioni tipo /policy non gestite
- se esistono trailing slash incoerenti

# Regole di implementazione
1. Il router pubblico deve servire sempre e solo index.php.
2. Le route pulite devono essere trasformate in parametri interni per index.php.
3. pages/*.php devono restare template interni, non endpoint pubblici.
4. Gli asset devono usare una base coerente:
   - BASE_URL
   - root-relative path
   - oppure helper centralizzato
5. Se esiste /?page=slug, deve fare 301 verso /slug.
6. Se esiste accesso diretto a pages/*.php, deve essere bloccato o reso non pubblico.
7. Nessuna duplicazione di logica tra route query-string e route pulite.
8. Nessuna patch SEO successiva finché questa base non è stabile.

# Cosa NON fare
- Non creare rewrite rule che puntano a pages/*.php
- Non risolvere il problema con canonical lasciando due URL vivi
- Non usare path relativi fragili tipo assets/css/style.css senza base coerente
- Non introdurre due router paralleli
- Non lasciare /?page=slug pubblico e indicizzabile se il pubblico deve usare /slug
- Non fare fix per singola pagina se il problema è strutturale

# Output richiesto
Restituisci SEMPRE nel formato seguente.

## Routing Audit Summary
- Stato attuale:
- Problema principale:
- Source of truth desiderata:
- Rischio architetturale:

## Problemi trovati
| Severità | Area | Problema | Evidenza | Fix strutturale |
|----------|------|----------|----------|-----------------|

## Target Architecture
- Entry point pubblico:
- Formato URL pubblico:
- Template interni:
- Gestione asset:
- Redirect richiesti:
- Blocchi richiesti:

## Patch Plan Ordinato
| Priorità | Intervento | Obiettivo | File coinvolti | Rischio | Impatto |
|----------|------------|-----------|----------------|---------|---------|

## Regole definitive da imporre
- ...
- ...
- ...

## Verifiche post-patch
| Controllo | Metodo | Esito atteso |
|----------|--------|--------------|

# Se l'utente chiede implementazione
Se richiesto esplicitamente, genera la patch con questo ordine:
1. .htaccess
2. index.php/router
3. include/head/footer path base
4. asset paths nei template
5. redirect query string -> slug
6. blocco accesso diretto a pages/*
7. verifica finale

# Vincoli
- Privilegiare una sola source of truth
- Niente workaround con alias o doppi percorsi
- Niente patch cosmetiche SEO prima della correzione routing
- Nessun refactor non necessario oltre il routing e i path asset