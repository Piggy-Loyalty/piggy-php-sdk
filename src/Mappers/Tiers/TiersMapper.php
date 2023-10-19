<?php

namespace Piggy\Api\Mappers\Tiers;

/**
 * Class TiersMapper
 * @package Piggy\Api\Mappers\Tiers
 */
class TiersMapper
{
    /**
     * @param $data
     * @return array
     */
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
