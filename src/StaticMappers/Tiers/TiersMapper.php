<?php

namespace Piggy\Api\StaticMappers\Tiers;

/**
 * Class TiersMapper
 */
class TiersMapper
{
    public static function map($data): array
    {
        $tiers = [];
        foreach ($data as $item) {
            $tiers[] = TierMapper::map($item);
        }

        return $tiers;
    }
}
