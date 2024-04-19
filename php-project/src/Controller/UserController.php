<?php

namespace App\Controller;

use App\Infrastructure\ConnectionProvider;
use App\Infrastructure\Utils;
use App\Model\User;
use App\Model\UserTable;

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

	public function showUser(int $id): void
	{
		$user = $this->table->findUserInDatabase($id);
		require __DIR__ . '/../View/show_user_form.php';
	}

	public function saveAvatar($id): string
	{
		if ($_FILES['upfile']['error'] == 0) {
			$fileName = $_FILES['upfile']['name'];
			$fileType = $_FILES['upfile']['type'];
			if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif'])) {
				echo "Недопустимый тип файла";
				exit;
			}
			$newFileName = $id . "." . pathinfo($fileName, PATHINFO_EXTENSION);
			if (move_uploaded_file($fileName, "uploads/" . $newFileName)) {
				echo "Файл успешно загружен";
				return $newFileName;
			} else {
				echo "Ошибка при загрузке файла";
				exit;
			}
		}
		return false;
	}
}