<?php
class Database
{
    private $host = "localhost";
    private $db_name = "user_auth";
    private $username = "root";
    private $password = "";
    public $conn;

    // Functie om verbinding te maken met de database
    public function getConnection()
    {
        $this->conn = null;
        try {
            // Maak een nieuwe PDO verbinding
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            // Stel de foutmodus in op uitzondering
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            // Toon een foutmelding als de verbinding mislukt
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}