<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Piggy\Api\Mappers\Loyalty\MediaMapper;
use Piggy\Api\Models\Loyalty\Rewards\DigitalReward;

/**
 * Class DigitalRewardMapper
 * @package Piggy\Api\Mappers\Shops
 */
class DigitalRewardMapper
{
    /**
     * @param $data
     * @return DigitalReward
     */
    public function map($data): DigitalReward
    {
        $mediaMapper = new MediaMapper();

        if (isset($data->media)) {
            $media = $mediaMapper->map($data->media);
        }

        return new DigitalReward(
            $data->uuid,
            $data->title ?? '',
            $data->required_credits ?? null,
            $media ?? null,
            $data->description ?? ''
        );
    }
}