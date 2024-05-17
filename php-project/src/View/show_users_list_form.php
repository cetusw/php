<?php
  require_once __DIR__ . '/../Infrastructure/Utils.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User info</title>
	<link rel="stylesheet" href="src/View/styles/show-users-list-style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="user-card">
	<?php foreach ($users as $user) { ?>
	<div class="preview">
		<h1 class="preview__header">User <?= htmlentities($user->getId()) ?> Information</h1>
		<a href="show_user.php?user_id=<?= $user->getId() ?>"><?= htmlentities($user->getFirstName()) ?></a>
		<p><?= htmlentities($user->getLastName()) ?></p>
		<img class="preview__avatar" src="<?= $user->getAvatarPath() ?>" alt="Avatar Image">
		<form action="delete_user.php?user_id=<?= $user->getId() ?>" method="post">
			<button class="btn btn-primary" type="submit">Delete User</button>
		</form>
		<form action="index.php" method="post">
			<button class="btn btn-primary" type="submit">Registration</button>
		</form>
	</div>
	<?php } ?>
</div>
</body>