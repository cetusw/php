<?php

use App\Controller\UserController;

require_once __DIR__ . '/vendor/autoload.php';

try {
	$controller = new UserController();
	$controller->showUsersList();
} catch (Exception $e) {
	echo $e->getMessage();
}