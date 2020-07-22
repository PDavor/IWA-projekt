# Virtualna mjenjačnica
Projekt virtualne mjenjačnice je kreiran u sklopu kolegija izgradnja web aplikacija. U projektu je korišten HTML, CSS i PHP.
## Instalacija
Preuzimanje i instalacija projekta se može napraviti na sljedeći način: 
1. Preuzmite ovaj repozitorij klikom na zeleni gumb *Code* i zatim *Download ZIP*.
2. Preuzmite i instalirajte [XAMPP](https://www.apachefriends.org/index.html).
3. Raspakirajte projekt u *htdocs* mapu unutar mape gdje ste instalirali XAMPP.
4. Pokrenite *XAMPP Control Panel* s Apache i MySql.
5. Otvorite poveznicu *http://localhost/phpmyadmin* i kliknite na gumb *Import*, tu je prvo potrebno uploadati datoteku *kreiraj_bazu.sql* i nakon toga datoteku *podaci_za_bazu.sql*.
6. Projekt je instaliran i možete ga otvoriti na *http://localhost/naziv-mape-repozitorija/* npr. *http://localhost/IWA-projekt-master/*
## Specifikacije
Ovaj projekt omogućuje virtualnu razmjenu valuta. Postoje četiri uloge korisnika, neregistrirani korisnik, registrirani korisnik, moderator i administrator. U nastavku će biti objašnjene njihove mogućnosti i ograničenja.
### Neregistrirani korisnik
Neregistrirani korisnik može samo vidjeti stranice *O autori* i *Naslovnu stranicu*, na naslovnoj stranici su prikazane sve valute i klikom na valutu se prikaže tečaj i audio zapis sa himnom ako je postavljen.
### Registrirani korisnik
Ima mogućnosti kao i neregistrirani korisnik. Također može upravljati svojim valutama(unos, pregledavanje, ažuriranje) i može poslati zahtjev za razmjenu valute i pregledati povijest svojih zahtjeva.
- Podaci za prijavu (jedan od kreiranih računa): 
  - korisničko ime: pkos 
  - lozinka: 123456
### Moderator
Ima mogućnosti registriranog korisnika i uz to može vidjeti zahtjeve za razmjenu valute. Može prihvatiti ili odbiti zahtjev ako je zadužen za tu valutu i ako je trenutno vrijeme unutar vremena definiranog za prodaju prodajne valute. Također može jednom dnevno ažurirati tečaj valute za koje je zadužen.
- Podaci za prijavu (jedan od kreiranih računa): 
  - korisničko ime: voditelj
  - lozinka: 123456
### Administrator
Ima mogućnosti kao moderator i uz to može upravljati valutama i korisnicima(dodavati, brisati, ažurirati), može vidjeti ukupan iznos prodanih valuta te ih može filtrirati prema moderatoru koji je zadužen za valute i vremenskom razdoblju. Za unos datuma i vremena se koristi hrvatski format (dd.mm.ggg sat:minuta:sekuna).
- Podaci za prijavu (jedan od kreiranih računa): 
  - korisničko ime: admin
  - lozinka: foi
