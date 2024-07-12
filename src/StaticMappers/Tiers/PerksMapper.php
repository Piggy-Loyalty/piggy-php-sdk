<?php

namespace Piggy\Api\StaticMappers\Tiers;

class PerksMapper
{
    public static function map($data): array
    {
        $perks = [];

        foreach ($data as $item) {
            $perks[] = PerkMapper::map($item);
        }

        return $perks;
    }
}
