<?php

namespace Piggy\Api\StaticMappers\Loyalty\RewardAttributes;

class RewardAttributesMapper
{
    /**
     * @param array $data
     * @return array
     */
    public static function map(array $data): array
    {
        $rewardAttributes = [];

        foreach ($data as $item) {
            $rewardAttributes[] = RewardAttributeMapper::map($item);
        }

        return $rewardAttributes;
    }
}