<?php
require_once __DIR__ . '/../Infrastructure/Utils.php';

$userId = $_GET['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User info</title>
  <link rel="stylesheet" href="src/View/styles/show-user-style.css">
</head>
<body>
<div class="preview">
  <h1 class="preview__header">User <?= htmlentities($user->getId()) ?> Information</h1>
  <p>First Name: <?= htmlentities($user->getFirstName()) ?></p>
  <p>Last name: <?= htmlentities($user->getLastName()) ?></p>
  <p>Middle name: <?= htmlentities($user->getMiddleName()) ?></p>
  <p>Gender: <?= htmlentities($user->getGender()) ?></p>
  <p>Birth Date: <?= htmlentities(\App\Infrastructure\Utils::convertDataTimeToString($user->getBirthDate())) ?></p>
  <p>Email: <?= htmlentities($user->getEmail()) ?></p>
  <p>Phone:<?= htmlentities($user->getPhone()) ?></p>
  <p>Avatar path:</p>
  <img class="preview__avatar" src="<?= $user->getAvatarPath() ?>" alt="Avatar Image">
  <form action="delete_user.php?user_id=<?= $user->getId() ?>" method="post">
    <button type="submit">Delete User</button>
  </form>
</div>
</body>