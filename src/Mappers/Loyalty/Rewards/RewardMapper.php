<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Exception;
use Piggy\Api\Enum\RewardType;
use Piggy\Api\Models\Loyalty\Rewards\DigitalReward;
use Piggy\Api\Models\Loyalty\Rewards\PhysicalReward;

class RewardMapper
{
    /**
     * @param object $data
     * @return PhysicalReward|DigitalReward
     * @throws Exception
     */
    public function map(object $data)
    {
        $physicalMapper = new PhysicalRewardMapper();
        $digitalMapper = new DigitalRewardMapper();

        $reward = null;

        if ($data->reward_type === RewardType::PHYSICAL) {
            $reward = $physicalMapper->map($data);
        }

        if ($data->reward_type === RewardType::DIGITAL) {
            $reward = $digitalMapper->map($data);
        }

        if ($reward === null) {
            throw new Exception("Reward could not be mapped. No valid reward type given");
        }

        return $reward;
    }
}
