---
name: seo-audit
description: Audit tecnico SEO del sito web Edilmia. Analizza codice, template e output HTML per trovare problemi SEO strutturali e produrre un piano di patch.
---

# Obiettivo
Eseguire un audit SEO tecnico completo del sito Edilmia già esistente, senza modificare file nella prima fase.

# Quando usarla
Usa questa skill quando l'obiettivo è:
- capire i problemi SEO reali del sito
- trovare errori tecnici e semantici
- produrre un piano di correzione ordinato
- evitare patch casuali

# Istruzioni operative
1. Analizza la codebase del sito web.
2. Identifica:
   - title mancanti, duplicati o troppo lunghi
   - meta description mancanti, duplicate o troppo lunghe
   - assenza o uso scorretto di H1
   - gerarchia heading errata
   - immagini senza alt
   - canonical mancanti o incoerenti
   - robots.txt assente o errato
   - sitemap.xml assente o incompleta
   - open graph / twitter tags assenti
   - structured data assente
   - link interni deboli o mancanti
   - contenuti troppo sottili o duplicati
   - problemi che impattano crawl/indexing
   - criticità performance che possono influenzare SEO

3. Non scrivere codice nella fase iniziale.
4. Produci un report con severità e piano di intervento.

# Output richiesto
Restituisci SEMPRE in questo formato:

## SEO Audit Summary
- Stato generale:
- Rischio SEO:
- Priorità immediata:

## Problemi trovati
| Severità | Area | Problema | Evidenza | Fix consigliato |
|----------|------|----------|----------|-----------------|

## Patch Plan
1. ...
2. ...
3. ...

## File probabilmente coinvolti
- path/file.ext
- path/file.ext

# Vincoli
- Nessun refactor architetturale non richiesto
- Nessuna invenzione di pagine o URL non esistenti
- Nessuna patch nella stessa risposta dell’audit, salvo richiesta esplicita
- Evidenziare conflitti con implementazione attuale