<?php

namespace Piggy\Api\Mappers\Contacts\CollectableRewards;

use Piggy\Api\Enums\RewardType;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Mappers\Media\MediaMapper;
use Piggy\Api\Models\Contact\Reward;
use stdClass;

/**
 * @extends BaseModelMapper<Reward>
 */
class RewardMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Reward
    {
        return new Reward(
            uuid: $data->uuid,
            title: $data->title,
            type: RewardType::from($data->type),
            active: $data->active,
            description: $data->description,
            requiredCredits: $data->required_credits,
            media: $data->media
                ? MediaMapper::map($data->media)
                : null,
            costPrice: $data->cost_price,
            stock: $data->stock,
            preRedeemable: $data->pre_redeemable,
            expirationDuration: $data->expiration_duration,
            customAttributes: (array) $data->custom_attributes,
        );
    }
}
