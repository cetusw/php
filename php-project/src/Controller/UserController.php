<?php

namespace App\Controller;

use App\Infrastructure\ConnectionProvider;
use App\Infrastructure\Utils;
use App\Model\User;
use App\Model\UserTable;
use App\Infrastructure\Config;

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
		$this->saveAvatar($userId);

		$redirectUrl = "/show_user.php?user_id=$userId";
		header('Location: ' . $redirectUrl, true, 303);
		die();
	}

	public function showUser(int $userId): void
	{
		$user = $this->table->findUserInDatabase($userId);
		if ($user === null) {
			throw new \RuntimeException('User Not Found');
		} else {
			require __DIR__ . '/../View/show_user_form.php';
		}
	}

	public function showUsersList(): void
	{
		$users = $this->table->findUsersInDatabase();
		if ($users === []) {
			throw new \RuntimeException('Users Not Found');
		} else {
			require __DIR__ . '/../View/show_users_list_form.php';
		}
	}

	public function updateUser(int $userId, array $newData): void
	{
		$user = $this->table->findUserInDatabase($userId);
		$user->setFirstName($newData['first_name']);
		$user->setLastName($newData['last_name']);
		$user->setGender($newData['gender']);
		$birthDate = Utils::parseDateTime($newData['birth_date'], self::DATE_TIME_FORMAT);
		$user->setBirthDate($birthDate);
		empty($newData['email']) ? $user->setEmail(null) : $user->setEmail($newData['email']);
		empty($newData['phone']) ? $user->setPhone(null) : $user->setPhone($newData['phone']);
		empty($newData['avatar_path']) ? $user->setAvatarPath(null) : $user->setAvatarPath($newData['avatar_path']);
		$user->setAvatarPath($newData['avatar_path']);

		$this->table->updateUserInDatabase($user);
		$this->saveAvatar($userId);

		$redirectUrl = "/show_user.php?user_id=$userId";
		header('Location: ' . $redirectUrl, true, 303);
		die();
	}

	private function saveAvatar(int $userId): bool
	{
		$avatarPath = $_FILES['avatar_path'] ?? null;
		if ($avatarPath === null || $avatarPath['error'] !== UPLOAD_ERR_OK) {
			return false;
		}
		$fileName = $_FILES['avatar_path']['tmp_name'];
		$fileType = mime_content_type($fileName);
		if (!in_array($fileType, Config::getValidTypes())) {
			throw new \RuntimeException('Invalid file type');
		}
		$newFileName = $userId . "." . pathinfo($fileName, PATHINFO_EXTENSION);
		$newPath = './uploads/' . $newFileName;
		if (!move_uploaded_file($_FILES['avatar_path']['tmp_name'], $newPath)) {
			throw new \RuntimeException('Failed to move uploaded file');
		}
		$this->table->addPathToDatabase($userId, $newPath);
		return true;
	}
}