<?php

namespace Piggy\Api\Mappers\Tier;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Mappers\Media\MediaMapper;
use Piggy\Api\Mappers\Perks\PerkOptionCollectionMapper;
use Piggy\Api\Models\Tier;
use stdClass;

class TierMapper extends BaseModelMapper
{
    public function map(stdClass $data): Tier
    {
        return new Tier(
            uuid: $data->uuid ?? null,
            name: $data->name,
            description: $data->description ?? null,
            position: $data->position,
            media: $data->media ? (new MediaMapper)->map($data->media) : null,
            perks: (new PerkOptionCollectionMapper)->map($data->perks)
        );
    }
}
