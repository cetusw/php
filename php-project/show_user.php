<?php

require_once __DIR__ . '/src/Controller/UserController.php';

$controller = new UserController();
$controller->showUser((int) $_GET['user_id']);