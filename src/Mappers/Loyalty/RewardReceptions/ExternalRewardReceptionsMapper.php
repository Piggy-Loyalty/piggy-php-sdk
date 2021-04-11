<?php

namespace Piggy\Api\Mappers\Loyalty\RewardReceptions;

use Piggy\Api\Mappers\Loyalty\MemberMapper;
use Piggy\Api\Mappers\Loyalty\Rewards\ExternalRewardMapper;
use Piggy\Api\Models\Loyalty\RewardReceptions\ExternalRewardReception;
use Piggy\Api\Models\Loyalty\RewardReceptions\PhysicalRewardReception;

/**
 * Class ExternalRewardReceptionsMapper
 * @package Piggy\Api\Mappers\Loyalty\RewardReceptions
 */
class ExternalRewardReceptionsMapper
{
    /**
     * @param object $data
     * @return ExternalRewardReception
     */
    public function map(object $data): ExternalRewardReception
    {
        $memberMapper = new MemberMapper();
        $member = $memberMapper->map($data->member);

        $externalRewardMapper = new ExternalRewardMapper();
        $externalReward = $externalRewardMapper->map($data->external_reward);

        return new ExternalRewardReception(
            $data->id,
            $data->title,
            $data->credits,
            $member,
            $externalReward
        );
    }
}
