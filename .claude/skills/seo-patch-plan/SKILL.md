---
name: seo-patch-plan
description: Trasforma un audit SEO del sito Edilmia in un patch plan tecnico reale, ordinato, verificabile e a basso rischio.
---

# Obiettivo
Convertire un audit SEO già esistente in un piano di implementazione concreto, tecnico e sequenziale, senza mescolare priorità diverse e senza proporre fuffa generica.

# Quando usarla
Usa questa skill quando:
- esiste già un audit SEO
- bisogna decidere cosa implementare davvero
- serve un ordine corretto di intervento
- vuoi evitare patch disordinate o troppo invasive
- vuoi distinguere tra fix SEO essenziali e miglioramenti opzionali

# Input atteso
L'input dovrebbe includere:
- audit SEO già prodotto
- elenco file coinvolti o sospetti
- eventuali vincoli architetturali del progetto
- eventuali pagine principali del sito

Se l'audit non è completo, non inventare dettagli: segnala le dipendenze mancanti.

# Regole operative
1. Non riscrivere l'audit.
2. Non generare codice nella prima risposta, salvo richiesta esplicita.
3. Non mischiare SEO tecnica, analytics, marketing e contenuti come se fossero la stessa priorità.
4. Separa chiaramente:
   - SEO core/head metadata
   - indexing/canonical/URL
   - structured data
   - immagini/performance
   - content SEO
   - tracking/analytics
5. Ogni intervento deve avere:
   - obiettivo
   - file coinvolti
   - dipendenze
   - rischio
   - impatto
   - modalità di verifica
6. Evidenzia i punti che potrebbero creare:
   - duplicazione URL
   - regressioni sul routing
   - metadata incoerenti
   - mismatch sitemap/canonical/router
7. Se una proposta dell’audit è debole o non giustificata, segnalarlo esplicitamente.
8. Non proporre refactor architetturali non richiesti.
9. Privilegia patch piccole, reversibili e ad alto impatto.
10. Se gli URL puliti sono proposti, imponi sempre verifica su redirect, canonical e sitemap prima della patch.

# Criteri di priorità
Ordina i fix con questa logica:

## P0 — Critico
Problemi che impattano direttamente:
- title
- meta description
- canonical
- duplicazione URL
- indexabilità
- OG base se assente del tutto

## P1 — Alto
Problemi importanti ma dipendenti da base stabile:
- structured data
- social metadata completi
- heading strategy
- link interni principali

## P2 — Medio
Miglioramenti utili ma non bloccanti:
- lazy loading
- width/height immagini
- preload ragionato
- ottimizzazioni minori performance

## P3 — Separato / non SEO core
- analytics
- tracking
- tag manager
- strumenti marketing

# Metodo di lavoro
Analizza l’audit e trasformalo in:

1. piano ordinato
2. mappa dipendenze
3. sequenza implementativa
4. checklist di verifica finale

# Output richiesto
Restituisci SEMPRE nel formato seguente.

## Patch Plan Summary
- Stato di partenza:
- Obiettivo della patch:
- Approccio consigliato:
- Rischio complessivo:

## Valutazione critica dell’audit
| Punto audit | Valido / Debole / Da verificare | Motivo |
|------------|----------------------------------|--------|

## Patch Plan Ordinato
| Priorità | Intervento | Obiettivo | File coinvolti | Dipendenze | Rischio | Impatto |
|----------|------------|-----------|----------------|------------|---------|---------|

## Sequenza di implementazione
1. ...
2. ...
3. ...

## Dependency Map
- Intervento A dipende da:
- Intervento B blocca:
- Intervento C richiede verifica di:

## Verifiche post-patch
| Controllo | Metodo di verifica | Esito atteso |
|----------|--------------------|--------------|

## Cose da NON fare
- ...
- ...
- ...

# Vincoli
- Nessun codice se non richiesto
- Nessun consiglio marketing generico
- Nessuna invenzione di file o rotte non confermate
- Nessun “miglioramento” che aumenti rischio senza priorità reale
- Se serve verifica runtime, dirlo chiaramente