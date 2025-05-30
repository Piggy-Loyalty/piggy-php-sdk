<?php

namespace Piggy\Api\StaticMappers\Tiers;

use Piggy\Api\Models\Tiers\Tier;

class TierMapper
{
    public static function map($data): ?Tier
    {
        if (!$data->name) {
            return null;
        }

        return new Tier(
            $data->name,
            $data->position ?? 0,
            $data->uuid ?? null,
            $data->description ?? null,
            $data->media ? get_object_vars($data->media) : null
        );
    }
}
