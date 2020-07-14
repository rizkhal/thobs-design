<?php declare(strict_types=1);

namespace App\Constants;

abstract class BaseConstant
{
	/**
	 * Labels of all status
	 * @return array
	 */
	abstract public static function labels(): ?array;

	/**
	 * Get label where array labels
	 * @param  int $id
	 * @return string
	 */
	public static function label(int $id): ?string
	{
		return static::labels()[$id];
	}
}
