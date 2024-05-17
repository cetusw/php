<?php

namespace App\Model;

use App\Infrastructure\Utils;

class UserTable
{
	private const MYSQL_DATETIME_FORMAT = 'Y-m-d H:i:s';
	public function __construct(private readonly \PDO $connection)
	{
	}
	public function saveUserToDatabase(User $user): int
	{
		try {
			$query = "INSERT INTO user (first_name, last_name, middle_name, gender, birth_date, email, phone, avatar_path) 
    	VALUES (:first_name, :last_name, :middle_name, :gender, :birth_date, :email, :phone, :avatar_path)";
			$statement = $this->connection->prepare($query);
			$statement->execute([
				':first_name' => $user->getFirstName(),
				':last_name' => $user->getLastName(),
				':middle_name' => $user->getMiddleName(),
				':gender' => $user->getGender(),
				':birth_date' => Utils::convertDataTimeToString($user->getBirthDate()),
				':email' => $user->getEmail(),
				':phone' => $user->getPhone(),
				':avatar_path' => $user->getAvatarPath()
			]);
		} catch (\PDOException $e) {
		  throw new \RuntimeException($e->getMessage(), (int) $e->getCode(), $e);
		}
		return (int)$this->connection->lastInsertId();
	}

	public function findUserInDatabase(int $id): ?User
	{
		try {
			$query = "SELECT user_id, first_name, last_name, middle_name, gender, birth_date, email, phone, avatar_path
        FROM user WHERE user_id = $id";

			$statement = $this->connection->query($query);
			if ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
				return $this->createUserFromRow($row);
			}
		} catch (\PDOException $e) {
			throw new \RuntimeException($e->getMessage(), (int) $e->getCode(), $e);
		}
		return null;
	}

	public function findUsersInDatabase(): array
	{
		try {
			$users = [];
			$query = "SELECT * FROM user";

			$statement = $this->connection->query($query);
			while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
				$users[] = $this->createUserFromRow($row);
			}
			return $users;
		} catch (\PDOException $e) {
			throw new \RuntimeException($e->getMessage(), (int) $e->getCode(), $e);
		}
	}

	private function createUserFromRow(array $row): User
	{
		return new User(
			(int)$row['user_id'],
			$row['first_name'],
			$row['last_name'],
			$row['middle_name'] ?? null,
			$row['gender'],
			Utils::parseDateTime($row['birth_date'], self::MYSQL_DATETIME_FORMAT),
			$row['email'],
			$row['phone'] ?? null,
			$row['avatar_path'] ?? null
		);
	}
  public function addPathToDatabase($userId, string $path): void {
		$query = "UPDATE user SET avatar_path = '$path' WHERE user_id = $userId;";
    $statement = $this->connection->prepare($query);
		$statement->execute();
	}

	public function deleteUser(int $id): void
	{

    $query = "DELETE FROM user WHERE user_id = $id;";
		$statement = $this->connection->prepare($query);
		if ($statement->execute()) {
			require __DIR__ . '/../View/delete_user_notification.php';
		}
	}

	public function updateUserInDatabase($id, $user): void
	{
		$query = "UPDATE user SET
              first_name = $user->getFirstName(), 
              last_name = $user->getFirstName()
              WHERE user_id = $id;";
		$statement = $this->connection->prepare($query);
		$statement->execute();
	}
}