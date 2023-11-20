<?php

class Database
{
    public $pdo;

    public function __construct($servername = 'localhost', $username = 'root', $password = 'QweMus?!123!', $dbname = 'OOP')
    {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function toevoegen($naam, $achternaam, $email, $geboortedatum)
    {
        try {
            $sql = "INSERT INTO klanten (naam, achternaam, email, geboortedatum) VALUES (:naam, :achternaam, :email, :geboortedatum)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':naam', $naam);
            $stmt->bindParam(':achternaam', $achternaam);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':geboortedatum', $geboortedatum);
            $stmt->execute();
            echo "Toevoegen Is Gelukt";
        } catch (PDOException $e) {
            echo "Je hebt een fout opgetreden" . $e->getMessage();
        }
    }

    public function Select($id = null)
    {
        if ($id !== null) {
            $sql = "SELECT * FROM klanten WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } else {
            $sql = "SELECT * FROM klanten";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }
}
