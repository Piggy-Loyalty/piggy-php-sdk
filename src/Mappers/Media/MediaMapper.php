<?php

namespace Piggy\Api\Mappers\Media;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Media;
use stdClass;

class MediaMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Media
    {
        return new Media(
            $data->id,
            $data->type,
            $data->value
        );
    }
}
