<?php

namespace Piggy\Api\Mappers\Loyalty\RewardAttributes;

class RewardAttributesMapper
{
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
