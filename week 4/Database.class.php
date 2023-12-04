<?php

class Database
{
    public $pdo;

    public function __construct(string $servername = 'localhost', string $username = 'root', string $password = 'QweMus?!123!', string $dbname = 'OOP')
    {
        $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function toevoegen(string $naam, string $achternaam, string $email, string $geboortedatum)
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

    public function Select(int $id = null)
    {
        if ($id !== null) {
            $sql = "SELECT * FROM Leerlingen WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
        $sql = "SELECT * FROM Leerlingen";
        $stmt = $this->pdo->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }


    public function Update(int $id, string $naam, string $achternaam, string $email, string $geboortedatum)
    {
        $sql = "UPDATE Leerlingen SET naam = :naam, achternaam = :achternaam, email = :email, geboorte_datum = :geboorte_datum WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':achternaam', $achternaam);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':geboorte_datum', $geboortedatum);
        $stmt->execute();
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM Leerlingen WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
