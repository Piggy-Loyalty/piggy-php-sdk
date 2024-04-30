<?php

namespace Piggy\Api\Mappers;

use DateTime;
use DateTimeInterface;

/**
 * Class BaseMapper
 */
abstract class BaseMapper
{
    public function parseDate(string $date): DateTime
    {
        $dateTime = DateTime::createFromFormat(DateTimeInterface::ATOM, $date);

        if ($dateTime === false) {
            throw new \InvalidArgumentException('Invalid date format');
        }

        return $dateTime;
    }
}
