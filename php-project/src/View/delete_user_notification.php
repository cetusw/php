<!DOCTYPE html>
<html lang="en">
<head>
	<title>User has been deleted</title>
	<link rel="stylesheet" href="src/View/styles/show-user-style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="preview">
	<h1>User has been deleted</h1>
	<form action="/index.php" method="post">
		<button class="btn btn-primary" type="submit">Registration</button>
	</form>
  <form action="/show_users_list.php">
    <button class="btn btn-primary" type="submit">Show Users List</button>
  </form>
</div>
</body>