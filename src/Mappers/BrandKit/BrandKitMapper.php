<?php

namespace Piggy\Api\Mappers\BrandKit;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Models\BrandKit;
use stdClass;

class BrandKitMapper extends BaseMapper
{
    public function map(stdClass $data): BrandKit
    {
        return new BrandKit(
            $data->small_logo_url,
            $data->large_logo_url,
            $data->primary_color,
            $data->secondary_color,
            $data->tertiary_color,
            $data->quarternary_color,
            $data->font_family,
        );
    }
}
