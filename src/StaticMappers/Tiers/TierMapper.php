<?php

namespace Piggy\Api\StaticMappers\Tiers;

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
    public static function map($data): Tier
    {
        return new Tier(
            $data->name,
            $data->position,
            $data->uuid ?? null,
            $data->description ?? null,
            $data->media ?? null
        );
    }
}
