<?php

namespace Piggy\Api\StaticMappers\Loyalty;

use Exception;
use Piggy\Api\Enum\LoyaltyTransactionType;
use Piggy\Api\StaticMappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\StaticMappers\Loyalty\Receptions\RewardReceptionMapper;
use Piggy\Api\Models\Loyalty\Transactions\LoyaltyTransaction;

/**
 * Class LoyaltyTransactionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class LoyaltyTransactionMapper
{
    /**
     * @param $data
     * @return LoyaltyTransaction[]
     * @throws Exception
     */
    public static function map($data): array
    {
        $creditReceptionMapper = new CreditReceptionMapper();
        $rewardReceptionMapper = new RewardReceptionMapper();

        $transactions = [];

        foreach ($data as $transactionData) {
            switch ($transactionData->type) {

                case LoyaltyTransactionType::CREDIT_RECEPTION:
                    $mapper = $creditReceptionMapper;
                    break;

                case LoyaltyTransactionType::PHYSICAL_REWARD_RECEPTION:
                case LoyaltyTransactionType::DIGITAL_REWARD_RECEPTION:
                    $mapper = $rewardReceptionMapper;
                    break;

                default:
                    continue 2;
            }

            $transactions[] = $mapper->map($transactionData);
        }

        return $transactions;
    }
}
