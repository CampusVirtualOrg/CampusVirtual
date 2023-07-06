<?php
$servername = "127.0.0.1";
$username = "root";
$password = "rootpass";
$database = "campusVirtual";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Falha na conexão com o banco de dados: " . $e->getMessage());
}


