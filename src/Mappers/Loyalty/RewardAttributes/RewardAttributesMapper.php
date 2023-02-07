<?php

namespace Piggy\Api\Mappers\Loyalty\RewardAttributes;

class RewardAttributesMapper
{
    /**
     * @param array $data
     * @return array
     */
    public function map(array $data): array
    {
        $rewardAttributeMapper = new RewardAttributeMapper;
        $rewardAttributes = [];

        foreach ($data as $item) {
            $rewardAttributes[] = $rewardAttributeMapper->map($item);
        }

        return $rewardAttributes;
    }
}