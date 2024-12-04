<?php

namespace Piggy\Api\Mappers\Tier;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Tier;
use stdClass;

class TierMapper extends BaseModelMapper
{
    public function map(stdClass $data): Tier
    {
        return new Tier(
            $data->uuid ?? null,
            $data->name,
            $data->description ?? null,
            $data->position,
            $data->media,
            $data->perks
        );
    }
}
