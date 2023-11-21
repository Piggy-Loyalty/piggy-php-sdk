<?php

namespace Piggy\Api\StaticMappers\CustomAttributes;

use Piggy\Api\Models\CustomAttributes\Group;
use stdClass;

/**
 * Class MediaMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class GroupMapper
{
    /**
     * @param stdClass $data
     * @return Group
     */
    public static function map(stdClass $data): Group
    {
        return new Group(
            $data->id,
            $data->name,
            $data->position,
            $data->createdByUser ?? null
        );
    }
}