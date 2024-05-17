<?php

use App\Controller\UserController;

require_once __DIR__ . '/vendor/autoload.php';

try {
	$controller = new UserController();
	$controller->updateUser($_GET['user_id'], $_POST);
} catch (Exception $e) {
	echo $e->getMessage();
}