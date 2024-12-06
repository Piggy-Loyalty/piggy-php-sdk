<?php

namespace Piggy\Api\Services;

use DateTimeImmutable;
use InvalidArgumentException;

class DateParserService
{
    public static function parse(string $date): DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat(DATE_ATOM, $date)
            ?: throw new InvalidArgumentException('Invalid date format');
    }
}
