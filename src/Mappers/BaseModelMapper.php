<?php

namespace Piggy\Api\Mappers;

use DateTime;
use DateTimeInterface;
use stdClass;

abstract class BaseModelMapper extends BaseMapper
{
    abstract function map(stdClass $data): object;
}
