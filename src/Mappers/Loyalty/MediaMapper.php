<?php

namespace Piggy\Api\Mappers\Loyalty;

use Piggy\Api\Models\Loyalty\Media;
use stdClass;

/**
 * Class MediaMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class MediaMapper
{
    /**
     * @param stdClass $data
     * @return Media
     */
    public function map(stdClass $data): Media
    {
        return new Media(
            $data->type,
            $data->value
        );
    }
}