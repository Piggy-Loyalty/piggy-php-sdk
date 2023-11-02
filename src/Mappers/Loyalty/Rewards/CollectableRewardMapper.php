<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Exception;
use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Models\Loyalty\Rewards\CollectableReward;
use stdClass;

/**
 * Class CollectableRewardMapper
 * @package Piggy\Api\Mappers\Loyalty\Rewards
 */
class CollectableRewardMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return CollectableReward
     * @throws Exception
     */
    public function map(stdClass $data): CollectableReward
    {
        if (property_exists($data, 'contact')) {
            $contactMapper = new ContactMapper();
            $contact = $contactMapper->map($data->contact);
        }

        if (property_exists($data, 'reward')) {
            $rewardMapper = new RewardMapper();
            $reward = $rewardMapper->map($data->reward);
        }

        return new CollectableReward(
            $contact,
            $this->parseDate($data->created_at),
            $data->uuid,
            $data->title,
            $reward,
            $this->parseDate($data->expires_at),
            $data->has_been_collected
        );
    }
}
