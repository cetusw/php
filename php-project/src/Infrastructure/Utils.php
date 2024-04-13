<?php

class Utils
{
	private const MYSQL_DATETIME_FORMAT = 'Y-m-d H:i:s';
	public static function parseDateTime(string $value, string $format): DateTimeImmutable
	{
		$result = DateTimeImmutable::createFromFormat($format, $value);
		if (!$result)
		{
			throw new InvalidArgumentException("Invalid datetime value '$value'");
		}
		return $result;
	}

	public static function convertDataTimeToString(?DateTimeImmutable $date): ?string
	{
		return $date?->format(self::MYSQL_DATETIME_FORMAT);
	}
}