<?php
$host = 'localhost';
$dbname = 'trabalho-final';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;
    chasret=utf8",$username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo ' Error ao conectar ao banco de dados:'
    .$e -> getMessage();
    exit;
}

?>