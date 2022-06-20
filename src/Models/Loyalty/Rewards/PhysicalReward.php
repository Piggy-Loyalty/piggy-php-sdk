<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

use Piggy\Api\Models\Loyalty\Media;

/**
 * Class PhysicalReward
 * @package Piggy\Api\Models\Loyalty\Rewards
 */
class PhysicalReward extends Reward
{

    public function __construct(string $uuid, string $title, int $requiredCredits, Media $media, string $description = "", bool $active = true)
    {
        parent::__construct($uuid, $title, $requiredCredits, $media, $description, $active);
    }

}