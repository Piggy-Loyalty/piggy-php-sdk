<?php

namespace Piggy\Api\Mappers\BrandKit;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\BrandKit;
use stdClass;

class BrandKitMapper extends BaseModelMapper
{
    public function map(stdClass $data): BrandKit
    {
        return new BrandKit(
            smallLogoUrl: $data->small_logo_url,
            largeLogoUrl: $data->large_logo_url,
            primaryColor: $data->primary_color,
            secondaryColor: $data->secondary_color,
            tertiaryColor: $data->tertiary_color,
            quaternaryColor: $data->quarternary_color,
            fontFamily: $data->font_family,
        );
    }
}
