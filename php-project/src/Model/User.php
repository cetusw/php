<?php

class User
{
	private ?int $id;
	private string $firstName;
	private string $lastName;
	private ?string $middleName;
	private string $gender;
	private ?DateTimeImmutable $birthDate;
	private string $email;
	private ?string $phone;
	private ?string $avatarPath;

	public function __construct(?int $id, string $firstName, string $lastName, ?string $middleName, string $gender, ?DateTimeImmutable $birthDate, string $email, ?string $phone, ?string $avatarPath)
	{
		$this->id = $id;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->middleName = $middleName;
		$this->gender = $gender;
		$this->birthDate = $birthDate;
		$this->email = $email;
		$this->phone = $phone;
		$this->avatarPath = $avatarPath;
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

	public function getBirthDate(): ?DateTimeImmutable
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
}