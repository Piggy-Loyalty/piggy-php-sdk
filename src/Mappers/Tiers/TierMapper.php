<?php

namespace Piggy\Api\Mappers\Tiers;

use Piggy\Api\Models\Tiers\Tier;

/**
 * Class TierMapper
 * @package Piggy\Api\Mappers\Tiers
 */
class TierMapper
{
    /**
     * @param $data
     * @return Tier
     */
    public function map($data): Tier
    {
        return new Tier(
            $data->name,
            $data->position,
            $data->uuid ?? null,
            $data->description ?? null,
            $data->media ? get_object_vars($data->media) : null
        );
    }
}
