<?php

namespace Piggy\Api\Mappers;

use Piggy\Api\Models\BaseModel;
use stdClass;

/**
 * @template T of BaseModel
 */
abstract class BaseModelMapper
{
    /**
     * Map a single data object to a model instance.
     *
     * @param stdClass $data
     * @return T
     */
    abstract public static function map(stdClass $data): BaseModel;
}
