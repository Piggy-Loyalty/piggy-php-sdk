<?php

namespace Piggy\Api\Mappers\BrandKit;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\BrandKit;
use stdClass;

/**
 * @extends BaseModelMapper<BrandKit>
 */
class BrandKitMapper extends BaseModelMapper
{
    public static function map(stdClass $data): BrandKit
    {
        return new BrandKit(
            smallLogoUrl: $data->small_logo_url,
            largeLogoUrl: $data->large_logo_url,
            primaryColor: $data->primary_color,
            secondaryColor: $data->secondary_color,
            tertiaryColor: $data->tertiary_color,
            quaternaryColor: 'foo', // TODO: Fails for some reason
            fontFamily: $data->font_family,
        );
    }
}
