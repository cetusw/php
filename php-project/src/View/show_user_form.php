<?php
require_once __DIR__ . '/../Infrastructure/Utils.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User info</title>
  <link rel="stylesheet" href="src/View/styles/show-user-style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
  <p>Phone: <?= htmlentities($user->getPhone()) ?></p>
  <p>Avatar:</p>
  <?php if ($user->getAvatarPath() !== null) { ?>
    <img class="preview__avatar" src="<?= $user->getAvatarPath() ?>" alt="Avatar Image">
  <?php } ?>
  <form action="update_user_page.php?user_id=<?= $user->getId() ?>" method="post">
    <button class="btn btn-primary" type="submit">Update User</button>
  </form>
  <form action="delete_user.php?user_id=<?= $user->getId() ?>" method="post">
    <button class="btn btn-primary" type="submit">Delete User</button>
  </form>
  <form action="/show_users_list.php">
    <button class="btn btn-primary" type="submit">Show Users List</button>
  </form>
</div>
</body>