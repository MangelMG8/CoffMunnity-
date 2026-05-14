<?php
require_once __DIR__ . '/../../app/controllers/AuthController.php';

header('Content-Type: application/json');

$controller = new AuthController();
$controller->registerUserFromFirebase();
?>