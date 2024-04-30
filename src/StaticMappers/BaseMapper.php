<?php

namespace Piggy\Api\StaticMappers;

use DateTime;
use DateTimeInterface;

/**
 * Class BaseMapper
 */
abstract class BaseMapper
{
    /**
     * @return DateTime|false
     */
    public static function parseDate(string $date)
    {
        return DateTime::createFromFormat(DateTimeInterface::ATOM, $date);
    }
}
