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
        $media = $mediaMapper->map($data->media);

        $active = property_exists($data, 'active') ? $data->active : true;

        $physicalReward = new PhysicalReward(
            $data->uuid,
            $data->title,
            $data->required_credits,
            $media,
            $data->description ?? "",
            $active
        );

        return $physicalReward;
    }
}
