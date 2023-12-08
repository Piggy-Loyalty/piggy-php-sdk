<?php

namespace Piggy\Api\StaticMappers\Loyalty\Rewards;

use Exception;
use Piggy\Api\StaticMappers\BaseMapper;
use Piggy\Api\StaticMappers\Contacts\ContactMapper;
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
    public static function map(stdClass $data): CollectableReward
    {
        $contact = ContactMapper::map($data->contact);
        $reward = RewardMapper::map($data->reward);

        return new CollectableReward(
            $contact,
            self::parseDate($data->created_at),
            $data->uuid,
            $data->title,
            $reward,
            self::parseDate($data->expires_at),
            $data->has_been_collected
        );
    }
}
