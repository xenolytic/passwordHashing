# Login- en Registratiesysteem

Dit project is een eenvoudig login- en registratiesysteem gebouwd met OOP PHP en HTML. Het systeem maakt gebruik van een MySQL-database voor het opslaan van gebruikersgegevens en gebruikt `password_hash()` voor het hashen van wachtwoorden.

## Installatie

1. **Clone de repository:**
   ```bash
   git clone https://github.com/jouw-gebruikersnaam/login-registratie-systeem.git
   cd login-registratie-systeem
   ```

2. **Maak de database en tabel aan:**
   ```sql
   CREATE DATABASE user_auth;
   USE user_auth;

   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       email VARCHAR(255) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL
   );
   ```

3. **Configureer de databaseverbinding:**
   Open `Database.php` en pas de database-instellingen aan:
   ```php
   private $host = 'localhost';
   private $db_name = 'user_auth';
   private $username = 'root';
   private $password = '';
   ```

4. **Start de server:**
   Zorg ervoor dat je een lokale server zoals XAMPP of MAMP gebruikt en plaats de bestanden in de juiste directory (`htdocs` voor XAMPP).

5. **Open de registratie- en loginpagina's in je browser:**
   - Registratie: `http://localhost/login-registratie-systeem/register.php`
   - Login: `http://localhost/login-registratie-systeem/login.php`

## Gebruik

### Registreren

1. Ga naar de registratiepagina.
2. Vul je e-mailadres en wachtwoord in.
3. Klik op "Register". Als de registratie succesvol is, krijg je een bevestigingsbericht.

### Inloggen

1. Ga naar de loginpagina.
2. Vul je e-mailadres en wachtwoord in.
3. Klik op "Login". Als de inlogpoging succesvol is, krijg je een bevestigingsbericht.

## Foutafhandeling

- **Lege invoer:** Zorg ervoor dat alle invoervelden zijn ingevuld voordat je de gegevens verwerkt.
- **Hashfouten:** Gebruik `try-catch`-blokken om fouten bij het hashen af te handelen.
- **Verificatie-feedback:** Geef duidelijke feedback aan de gebruiker bij succesvolle of mislukte verificatie.
- **Dubbele gegevens:** Controleer of het e-mailadres al bestaat voordat je een nieuwe gebruiker registreert.