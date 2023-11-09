<?php

namespace Piggy\Api\StaticMappers\Tiers;

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
    public static function map($data): array
    {
        $tiers = [];
        foreach ($data as $item) {
            $tiers[] = TierMapper::map($item);
        }

        return $tiers;
    }
}
