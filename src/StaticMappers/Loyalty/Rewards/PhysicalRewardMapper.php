<?php

namespace Piggy\Api\StaticMappers\Loyalty\Rewards;

use Piggy\Api\Enum\RewardType;
use Piggy\Api\Models\Loyalty\Rewards\PhysicalReward;
use Piggy\Api\StaticMappers\Loyalty\MediaMapper;
use Piggy\Api\StaticMappers\Loyalty\RewardAttributes\RewardAttributesMapper;

class PhysicalRewardMapper
{
    public static function map($data): PhysicalReward
    {
        $media = isset($data->media) ? MediaMapper::map($data->media) : null;

        $active = $data->active ?? true;

        $attributesNamesToDelete = ['uuid', 'title', 'description', 'required_credits', 'reward_type', 'media', 'active', 'is_active', 'id', 'stock', 'cost_price'];

        $attributes = array_diff_key(get_object_vars($data), array_flip($attributesNamesToDelete));

        if (property_exists($data, 'attributes')) {
            $attributes = RewardAttributesMapper::map($data->$attributes);
        }

        return new PhysicalReward(
            $data->uuid,
            $data->title ?? '',
            $data->required_credits ?? null,
            $media ?? null,
            $data->description ?? '',
            $active,
            RewardType::byName($data->reward_type)->getValue() ?? null,
            $attributes
        );
    }
}