<?php

namespace Piggy\Api\Mappers\Loyalty\RewardReceptions;

use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Mappers\Loyalty\CreditBalanceMapper;
use Piggy\Api\Mappers\Loyalty\Rewards\RewardMapper;
use Piggy\Api\Models\Loyalty\RewardReceptions\RewardReception;

/**
 * Class RewardReceptionsMapper
 * @package Piggy\Api\Mappers\Loyalty\RewardReceptions
 */
class RewardReceptionMapper
{
    /**
     * @param $data
     * @return RewardReception
     */
    public function map($data): RewardReception
    {
        $contactMapper = new ContactMapper();
        $contact = $contactMapper->map($data->contact);

        $rewardMapper = new RewardMapper();
        $reward = $rewardMapper->map($data->reward);

        $creditBalanceMapper = new CreditBalanceMapper();
        $creditBalance = $creditBalanceMapper->map($data->credit_balance);

        $rewardReception = new RewardReception(
            $data->id,
            $data->title,
            $creditBalance,
            $contact,
//            $reward
        );

        return $rewardReception;
    }
}