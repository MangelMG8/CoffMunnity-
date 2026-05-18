<?php
// src/public/api/follow.php

require_once __DIR__ . '/../../app/controllers/FollowController.php';

$controller = new FollowController();
$controller->toggleFollow();

?>