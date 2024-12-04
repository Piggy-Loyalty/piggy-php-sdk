<?php

namespace Piggy\Api\Mappers;

use DateTimeImmutable;
use InvalidArgumentException;

abstract class BaseMapper
{
    public function parseDate(?string $date): ?DateTimeImmutable
    {
        return $date
            ? DateTimeImmutable::createFromFormat(DATE_ATOM, $date) ?: throw new InvalidArgumentException('Invalid date format')
            : null;
    }
}
