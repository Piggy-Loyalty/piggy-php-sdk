<?php

namespace Piggy\Api\StaticMappers\Tiers;

class TiersMapper
{
    public static function map($data): array
    {
        $tiers = [];
        foreach ($data as $item) {
            $tier = TierMapper::map($item);;

            if (!$tier) {
                continue;
            }

            $tiers[] = $tier;
        }

        return $tiers;
    }
}
