<?php
require_once __DIR__ . '/../../app/controllers/EditProfileController.php';

header('Content-Type: application/json');

$controller = new EditProfileController();
$controller->updateProfileApi();
?>