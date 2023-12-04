<?php

require_once("Database.class.php");
try {
    $db = new Database();
} catch (PDOException $e) {
    echo "Connection failed: ";
}
$id = isset($_GET['id']) ? $_GET['id'] : null;


$db->Delete($id);
header("Location: home.php");
