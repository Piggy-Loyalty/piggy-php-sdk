<?php

namespace Piggy\Api\Mappers\Contacts\CollectableRewards;

use DateMalformedStringException;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Contact\CollectableReward;
use Piggy\Api\Services\DateParserService;
use stdClass;

/**
 * @extends BaseModelMapper<CollectableReward>
 */
class CollectableRewardMapper extends BaseModelMapper
{
    /**
     * @throws DateMalformedStringException
     */
    public static function map(stdClass $data): CollectableReward
    {
        return new CollectableReward(
            uuid: $data->uuid,
            title: $data->title,
            reward: $data->reward
                ? RewardMapper::map($data->reward)
                : null,
            expiresAt: $data->expires_at
                ? DateParserService::parse($data->expires_at)
                : null,
            hasBeenCollected: $data->has_been_collected,
            createdAt: DateParserService::parse($data->created_at)
        );
    }
}
