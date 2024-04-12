<?php

require_once __DIR__ . '/src/Controller/UserController.php';

$controller = new UserController();
$controller->index();

/*require_once __DIR__ . '/src/Infrastructure/ConnectionProvider.php';
require_once __DIR__ . '/src/Model/User.php';
require_once __DIR__ . '/src/Model/UserTable.php';

$connection = ConnectionProvider::connectDatabase();
$table = new UserTable($connection);
  $user = new User(
	null,
	'John',
	'Doe',
	null,
	'male',
	new DateTimeImmutable('1960-12-05 00:00:00'),
	'john.do2e221@gmail.com',
	null,
	null,
);
$user = $table->findUserInDatabase(1);
var_dump($user);
echo 'OK';*/
