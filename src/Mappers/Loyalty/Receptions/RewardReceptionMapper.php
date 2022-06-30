<?php

namespace Piggy\Api\Mappers\Loyalty\Receptions;

use Piggy\Api\Enum\RewardReceptionType;
use Piggy\Api\Models\Loyalty\Receptions\DigitalRewardReception;
use Piggy\Api\Models\Loyalty\Receptions\PhysicalRewardReception;
use stdClass;

/**
 * Class CreditReceptionMapper
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

        if ($data->type === RewardReceptionType::PHYSICAL) {
            $rewardReception = $physicalRewardReceptionMapper->map($data);
        }

        if ($data->type === RewardReceptionType::DIGITAL) {
            $rewardReception = $digitalRewardReceptionMapper->map($data);
        }

        return $rewardReception;
    }
}
