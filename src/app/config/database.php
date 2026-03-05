<?php
$host = 'db'; 
$db   = 'coffmunnity_db';
$user = 'coffee_user';
$pass = 'coffee_password';
$charset = 'utf8mb4';

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $db_status = "Conexión exitosa";
} catch (PDOException $e) {
    $db_status = " Error: " . $e->getMessage();
}