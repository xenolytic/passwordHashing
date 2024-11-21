<?php
class User
{
    private $conn;
    private $table_name = "users"; // Zorg ervoor dat dit overeenkomt met je tabelnaam

    public $email;
    public $password;

    // Constructor om de databaseverbinding te initialiseren
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Functie om een nieuwe gebruiker te registreren
    public function register()
    {
        if ($this->conn === null) {
            echo "Database connection failed.";
            return false;
        }

        // SQL query om een nieuwe gebruiker in te voegen
        $query = "INSERT INTO " . $this->table_name . " (email, password) VALUES (:email, :password)";
        $stmt = $this->conn->prepare($query);

        // Sanitize de invoer
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        // Bind de parameters
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);

        // Voer de query uit
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Functie om een gebruiker in te loggen
    public function login()
    {
        if ($this->conn === null) {
            echo "Database connection failed.";
            return false;
        }

        // SQL query om de gebruiker op te halen
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);

        // Sanitize de invoer
        $this->email = htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        // Haal de rij op
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Controleer het wachtwoord
        if ($row && password_verify($this->password, $row['password'])) {
            return true;
        }
        return false;
    }
}