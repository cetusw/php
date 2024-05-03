<?php

use App\Infrastructure\ConnectionProvider;
use App\Model\UserTable;

require_once __DIR__ . '/vendor/autoload.php';

try {
	$connection = ConnectionProvider::connectDatabase();
	$table = new UserTable($connection);
	$table->deleteUser($_GET['user_id']);
} catch (Exception $e) {
	echo $e->getMessage();
}