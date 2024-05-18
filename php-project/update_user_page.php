<?php

use App\Controller\UserController;
use App\Model\UserTable;

require_once __DIR__ . '/vendor/autoload.php';

try {

	require 'src/View/update_user_form.php';
} catch (Exception $e) {
	echo $e->getMessage();
}