<?php

namespace Piggy\Api\Mappers\Tier;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Mappers\Media\MediaMapper;
use Piggy\Api\Mappers\Perks\PerkOptionCollectionMapper;
use Piggy\Api\Models\Tier;
use stdClass;

class TierMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Tier
    {
        return new Tier(
            uuid: $data->uuid,
            name: $data->name,
            description: $data->description,
            position: $data->position,
            media: $data->media
                ? MediaMapper::map($data->media)
                : null,
            perks: PerkOptionCollectionMapper::map($data->perks)
        );
    }
}
