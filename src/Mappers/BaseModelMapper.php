<?php

namespace Piggy\Api\Mappers;

use Piggy\Api\Traits\DateParser;
use stdClass;

abstract class BaseModelMapper
{
    use DateParser;

    abstract public function map(stdClass $data): object;
}
