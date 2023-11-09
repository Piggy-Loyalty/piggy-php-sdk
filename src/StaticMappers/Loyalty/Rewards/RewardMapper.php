<?php

namespace Piggy\Api\StaticMappers\Loyalty\Rewards;

use Exception;
use Piggy\Api\Enum\RewardType;
use Piggy\Api\Models\Loyalty\Rewards\DigitalReward;
use Piggy\Api\Models\Loyalty\Rewards\PhysicalReward;
use Piggy\Api\Models\Loyalty\Rewards\Reward;
use stdClass;

class RewardMapper
{
    /**
     * @param stdClass $data
     * @return DigitalReward|PhysicalReward
     * @throws Exception
     */
    public static function map(stdClass $data): Reward
    {
        $reward = null;

        if ($data->reward_type === RewardType::PHYSICAL) {
            $reward = PhysicalRewardMapper::map($data);
        }

        if ($data->reward_type === RewardType::DIGITAL) {
            $reward = DigitalRewardMapper::map($data);
        }

        if ($reward === null) {
            throw new Exception("Reward could not be mapped. No valid reward type given");
        }

        return $reward;
    }
}
