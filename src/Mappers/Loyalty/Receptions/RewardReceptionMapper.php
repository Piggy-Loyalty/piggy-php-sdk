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
        $physicalRewardReceptionMapper = new PhysicalRewardReceptionMapper();
        $digitalRewardReceptionMapper = new DigitalRewardReceptionMapper();

        $rewardReception = null;

        if ($data->type === LoyaltyTransactionType::PHYSICAL_REWARD_RECEPTION) {
            $rewardReception = $physicalRewardReceptionMapper->map($data);
        }

        if ($data->type === LoyaltyTransactionType::DIGITAL_REWARD_RECEPTION) {
            $rewardReception = $digitalRewardReceptionMapper->map($data);
        }

        return $rewardReception;
    }
}
