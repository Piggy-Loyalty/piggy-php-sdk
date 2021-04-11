<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

/**
 * Class RewardsMapper
 * @package Piggy\Api\Mappers\Loyalty\Rewards
 */
class RewardsMapper
{
    /**
     * @param array $rewards
     * @return array
     */
    public function map(array $rewards): array
    {
        $physicalRewardsMapper = new PhysicalRewardsMapper();
        $externalRewardsMapper = new ExternalRewardsMapper();
        $digitalRewardsMapper = new DigitalRewardsMapper();

        $result = [];
        foreach ($rewards as $rewardsType => $rewardsInType) {
            if ($rewardsType == "physical") {
                $rewards["physical"] = $physicalRewardsMapper->map($rewardsInType);
            }

            if ($rewardsType == "external") {
                $rewards["external"] = $externalRewardsMapper->map($rewardsInType);
            }

            if ($rewardsType == "digital") {
                $rewards["digital"] = $digitalRewardsMapper->map($rewardsInType);
            }
        }

        return $result;
    }
}
