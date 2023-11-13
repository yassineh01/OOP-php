<?php

class Database
{
    public $pdo;

    public function __construct($servername = 'localhost', $username = 'root', $password = 'QweMus?!123!', $dbname = 'shop')
    {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
