<?php

namespace Piggy\Api\Mappers;

use Piggy\Api\Models\BaseModel;
use stdClass;

abstract class BaseCollectionMapper extends BaseMapper
{
    /**
     * @param  stdClass[]  $data
     * @return BaseModel[]
     */
    abstract public function map(array $data): array;
}
