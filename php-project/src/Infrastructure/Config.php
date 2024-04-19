<?php

namespace App\Infrastructure;

class Config
{
  public static function getDatabaseDsn(): string
  {
    return 'mysql:host=localhost;dbname=php_course';
  }
	public static function getDatabaseUser(): string
	{
    return 'yogurt';
	}
	public static function getDatabasePassword(): string
	{
    return 'pAssw0rd#';
	}
}