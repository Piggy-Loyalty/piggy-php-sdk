<?php

namespace Piggy\Api\StaticMappers\CustomAttributes;

use Piggy\Api\Models\CustomAttributes\Option;
use stdClass;

/**
 * Class MediaMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class OptionsMapper
{
    /**
     * @param stdClass $data
     * @return Option
     */
    public static function map(stdClass $data): Option
    {
        return new Option(
            $data->value,
            $data->label,
            $data->description,
            $data->media ?? null
        );
    }
}