<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

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

        return new PhysicalReward(
            $data->uuid,
            $data->title ?? '',
            $data->required_credits ?? null,
            $media ?? null,
            $data->description ?? "",
            $active,
            $data->reward_type ?? null
        );
    }
}