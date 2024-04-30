<?php

namespace Piggy\Api\Mappers\Tiers;

/**
 * Class TiersMapper
 */
class TiersMapper
{
    public function map($data): array
    {
        $mapper = new TierMapper();

        $tiers = [];
        foreach ($data as $item) {
            $tiers[] = $mapper->map($item);
        }

        return $tiers;
    }
}
