<?php

namespace Piggy\Api\Services;

use DateMalformedStringException;
use DateTimeImmutable;

class DateParserService
{
    /**
     * @throws DateMalformedStringException
     */
    public static function parse(string $date): DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat(DATE_ATOM, $date)
            ?: new DateTimeImmutable($date);
    }
}
