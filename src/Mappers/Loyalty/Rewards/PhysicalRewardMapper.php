<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Piggy\Api\Enum\RewardType;
use Piggy\Api\Mappers\Loyalty\MediaMapper;
use Piggy\Api\Models\Loyalty\Rewards\PhysicalReward;

/**
 * Class PhysicalRewardMapper
 * @package Piggy\Api\Mappers\Loyalty\Rewards
 */
class PhysicalRewardMapper
{
    /**
     * @param $data
     * @return PhysicalReward
     */
    public function map($data): PhysicalReward
    {
        $mediaMapper = new MediaMapper();

        if (isset($data->media)) {
            $media = $mediaMapper->map($data->media);
        }

        $active = property_exists($data, 'active') ? $data->active : true;

        $attributesNamesToDelete = ['uuid', 'title', 'description', 'required_credits', 'reward_type', 'media', 'active', 'is_active', 'id', 'stock', 'cost_price'];
        $attributes = array_diff_key(get_object_vars($data), array_flip($attributesNamesToDelete));

        return new PhysicalReward(
            $data->uuid,
            $data->title ?? '',
            $data->required_credits ?? null,
            $media ?? null,
            $data->description ?? "",
            $active,
            RewardType::byName($data->reward_type)->getValue() ?? null,
            $attributes
        );
    }
}