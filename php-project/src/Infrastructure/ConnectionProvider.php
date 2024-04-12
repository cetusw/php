<?php

require_once __DIR__ . '/Config.php';
class ConnectionProvider
{
	public static function connectDatabase(): PDO
	{
		return new PDO(Config::getDatabaseDsn(), Config::getDatabaseUser(), Config::getDatabasePassword());
	}
}