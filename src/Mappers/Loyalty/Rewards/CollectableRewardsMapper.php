<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Exception;

/**
 * Class CollectableRewardsMapper
 */
class CollectableRewardsMapper
{
    /**
     * @throws Exception
     */
    public function map($data): array
    {
        $mapper = new CollectableRewardMapper();

        $collectableRewards = [];
        foreach ($data as $item) {
            $collectableRewards[] = $mapper->map($item);
        }

        return $collectableRewards;
    }
}
