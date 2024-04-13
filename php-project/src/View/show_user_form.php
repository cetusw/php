<?php
require_once __DIR__ . '/../Infrastructure/Utils.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User info</title>
</head>
<body>
    <h1>User <?= htmlentities($user->getId()) ?> Information</h1>
    <span>First Name: <?= htmlentities($user->getFirstName()) ?></span><br>
    <span>Last name: <?= htmlentities($user->getLastName()) ?></span><br>
    <span>Middle name: <?= htmlentities($user->getMiddleName()) ?></span><br>
    <span>Gender: <?= htmlentities($user->getGender()) ?></span><br>
    <span>Birth Date: <?= htmlentities(Utils::convertDataTimeToString($user->getBirthDate())) ?></span><br>
    <span>Email: <?= htmlentities($user->getEmail()) ?></span><br>
    <span>Phone:<?= htmlentities($user->getPhone()) ?></span><br>
    <span>Avatar path: <?= htmlentities($user->getAvatarPath()) ?></span>
</body>