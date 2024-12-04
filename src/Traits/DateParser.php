<?php

namespace Piggy\Api\Traits;

use DateTimeImmutable;
use InvalidArgumentException;

trait DateParser
{
    public function parseDate(?string $date): ?DateTimeImmutable
    {
        return $date
            ? DateTimeImmutable::createFromFormat(DATE_ATOM, $date) ?: throw new InvalidArgumentException('Invalid date format')
            : null;
    }
}
