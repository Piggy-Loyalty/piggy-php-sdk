<?php

namespace Piggy\Api\Mappers;

use stdClass;

abstract class BaseModelMapper
{
    abstract public static function map(stdClass $data): object;
}
