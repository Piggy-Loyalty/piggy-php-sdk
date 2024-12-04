<?php

namespace Piggy\Api\Mappers;

use stdClass;

abstract class BaseModelMapper extends BaseMapper
{
    abstract public function map(stdClass $data): object;
}
