# ParkEasy

## Popis projektu
ParkEasy je systém na správu parkovacích miest v budove alebo na parkovisku. Umožnuje správu používateľov, parkovacích miest, parkovísk a rezervácií.

## Funkcionality
- Registrácia a prihlásenie užívateľov
- Správa parkovísk
- Správa parkovacích miest
- Rezervácia parkovacích miest
- Prístup k databáze cez Adminer

## Požiadavky
- Docker
- Docker Compose

## Inštalačný postup

### Klonovanie repozitára
```bash
git clone https://github.com/vas-repo/parkeasy.git
cd parkeasy
```

### Spustenie aplikácie
```bash
docker-compose up -d
```

### Inicializácia databázy
Automaticky pomocou skriptov v `docker/sql/`.

### Prístup k aplikácii
- **Hlavná aplikácia:** [http://localhost](http://localhost)
- **Adminer (DB GUI):** [http://localhost:8080](http://localhost:8080)




