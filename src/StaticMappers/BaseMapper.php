<?php


namespace Piggy\Api\StaticMappers;

use DateTime;
use DateTimeInterface;
use stdClass;

/**
 * Class BaseMapper
 * @package Piggy\Api\Mappers
 */
abstract class BaseMapper
{
    /**
     * @param string $date
     * @return DateTime|false
     */
    public static function parseDate(string $date)
    {
        return DateTime::createFromFormat(DateTimeInterface::ATOM, $date);
    }
}
