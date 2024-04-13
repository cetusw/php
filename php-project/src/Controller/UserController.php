<?php

require_once __DIR__ . '/../Model/User.php';
require_once __DIR__ . '/../Model/UserTable.php';
require_once __DIR__ . '/../Infrastructure/ConnectionProvider.php';
require_once __DIR__ . '/../Infrastructure/Utils.php';
class UserController
{
	private const DATE_TIME_FORMAT = 'Y-m-d';
  private UserTable $table;

	public function __construct()
	{
		$connection = ConnectionProvider::connectDatabase();
		$this->table = new UserTable($connection);
	}

	public function index(): void
	{
		require_once __DIR__ . '/../View/register_user_form.php';
	}

	public function registerUser(array $data): void
	{
		$birthDate = Utils::parseDateTime($data['birth_date'], self::DATE_TIME_FORMAT);
		$birthDate = $birthDate->setTime(0, 0, 0);
		$user = new User(
			null,
			$data['first_name'],
			$data['last_name'],
			empty($data['middle_name']) ? null : $data['middle_name'],
			$data['gender'],
			$birthDate,
			$data['email'],
			empty($data['phone']) ? null : $data['phone'],
			empty($data['avatar_path']) ? null : $data['avatar_path']
		);

		$userId = $this->table->saveUserToDatabase($user);

		$redirectUrl = "/show_user.php?user_id=$userId";
		header('Location: ' . $redirectUrl, true, 303);
		die();
	}

	public function showUser(int $id): void
	{
		$user = $this->table->findUserInDatabase($id);
		require __DIR__ . '/../View/show_user_form.php';
	}
}