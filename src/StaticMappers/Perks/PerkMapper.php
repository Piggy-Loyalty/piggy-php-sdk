<?php

namespace Piggy\Api\StaticMappers\Perks;

use Piggy\Api\Models\Perks\Perk;

class PerkMapper
{
    public static function map($data): Perk
    {
        return new Perk(
            $data->uuid,
            $data->label,
            $data->name,
            $data->data_type
        );
    }
}
