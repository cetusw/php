<?php

class Utils
{
	public static function parseDateTime(string $value, string $format): DateTimeImmutable
	{
		$result = DateTimeImmutable::createFromFormat($format, $value);
		if (!$result)
		{
			throw new InvalidArgumentException("Invalid datetime value '$value'");
		}
		return $result;
	}
}