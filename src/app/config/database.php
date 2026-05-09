<?php
$host = getenv('DB_HOST'); 
$port = getenv('DB_PORT'); 
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    $db_status = "Conexión a Supabase exitosa y segura";
} catch (PDOException $e) {
    $db_status = "Error de conexión: " . $e->getMessage();
}