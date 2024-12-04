<?php

namespace Piggy\Api\Mappers;

use DateTime;
use DateTimeInterface;
use Piggy\Api\Models\BaseModel;
use stdClass;

abstract class BaseCollectionMapper extends BaseMapper
{
    /**
     * @param  stdClass[]  $data
     * @return BaseModel[]
     */
    abstract function map(array $data): array;
}
