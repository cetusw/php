<?php

use App\Controller\UserController;

require_once __DIR__ . '/vendor/autoload.php';

$controller = new UserController();
$controller->showUser((int) $_GET['user_id']);