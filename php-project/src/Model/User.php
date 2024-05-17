<?php

namespace App\Model;

class User
{
	public function __construct(
		private ?int $id,
		private string $firstName,
		private string $lastName,
		private ?string $middleName,
		private string $gender,
		private \DateTimeImmutable $birthDate,
		private string $email,
		private ?string $phone,
		private ?string $avatarPath
	)
	{
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getFirstName(): string
	{
		return $this->firstName;
	}

	public function getLastName(): string
	{
		return $this->lastName;
	}

	public function getMiddleName(): ?string
	{
		return $this->middleName;
	}

	public function getGender(): string
	{
		return $this->gender;
	}

	public function getBirthDate(): \DateTimeImmutable
	{
		return $this->birthDate;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getPhone(): ?string
	{
		return $this->phone;
	}

	public function getAvatarPath(): ?string
	{
		return $this->avatarPath;
	}

	public function setFirstName(string $firstName): ?string
	{
    return $this->firstName = $firstName;
	}

	public function setLastName(string $lastName): ?string
	{
		return $this->lastName = $lastName;
	}

	public function setMiddleName(?string $middleName): ?string
	{
		return $this->middleName = $middleName;
	}

	public function setGender(string $gender): ?string
	{
		return $this->gender = $gender;
	}

	public function setBirthDate(\DateTimeImmutable $birthDate): \DateTimeImmutable
	{
		return $this->birthDate = $birthDate;
	}

	public function setEmail(string $email): ?string
	{
		return $this->email = $email;
	}

	public function setPhone(?string $phone): ?string
	{
		return $this->phone = $phone;
	}

	public function setAvatarPath(?string $avatarPath): ?string
	{
		return $this->avatarPath = $avatarPath;
	}
}