<?php

use App\Controller\UserController;

require_once __DIR__ . '/vendor/autoload.php';

try {
  $controller = new UserController();
  $controller->showUser((int) $_GET['user_id']);
} catch (Exception $e) {
	echo $e->getMessage();
}