<?php

namespace Piggy\Api\Services;

use DateTimeImmutable;
use InvalidArgumentException;

class DateParserService
{
    public static function parse(?string $date): ?DateTimeImmutable
    {
        if ($date === null) {
            return null;
        }

        $parsedDate = DateTimeImmutable::createFromFormat(DATE_ATOM, $date);

        if ($parsedDate === false) {
            throw new InvalidArgumentException('Invalid date format');
        }

        return $parsedDate;
    }
}
