<?php

namespace Piggy\Api\Mappers\Loyalty\Receptions;

use Piggy\Api\Enum\LoyaltyTransactionType;
use Piggy\Api\Models\Loyalty\Receptions\DigitalRewardReception;
use Piggy\Api\Models\Loyalty\Receptions\PhysicalRewardReception;
use stdClass;

/**
 * Class RewardReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class RewardReceptionMapper
{
    /**
     * @param stdClass $data
     * @return DigitalRewardReception|PhysicalRewardReception|null
     */
    public function map(stdClass $data)
    {
        $rewardReception = null;

        if ($data->type === LoyaltyTransactionType::PHYSICAL_REWARD_RECEPTION) {
            $physicalRewardReceptionMapper = new PhysicalRewardReceptionMapper();
            $rewardReception = $physicalRewardReceptionMapper->map($data);
        }

        if ($data->type === LoyaltyTransactionType::DIGITAL_REWARD_RECEPTION) {
            $digitalRewardReceptionMapper = new DigitalRewardReceptionMapper();
            $rewardReception = $digitalRewardReceptionMapper->map($data);
        }

        return $rewardReception;
    }
}
