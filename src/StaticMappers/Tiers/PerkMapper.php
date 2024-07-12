<?php

namespace Piggy\Api\StaticMappers\Tiers;

use Piggy\Api\Models\Tiers\Perk;
use Piggy\Api\Models\Tiers\Tier;

class PerkMapper
{
    public static function map($data): Perk
    {
        return new Perk(
            $data->uuid,
            $data->label,
            $data->name,
            $data->dataType
        );
    }
}
