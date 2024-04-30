<?php

namespace Piggy\Api\Mappers;

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
    public function parseDate(string $date)
    {
        return DateTime::createFromFormat(DateTimeInterface::ATOM, $date);
    }
}
