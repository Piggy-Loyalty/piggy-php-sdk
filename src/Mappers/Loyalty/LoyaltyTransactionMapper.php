<?php

namespace Piggy\Api\Mappers\Loyalty;

use Exception;
use Piggy\Api\Enum\LoyaltyTransactionType;
use Piggy\Api\Mappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\Mappers\Loyalty\Receptions\RewardReceptionMapper;
use Piggy\Api\Models\Loyalty\Transaction\LoyaltyTransaction;

/**
 * Class CreditReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class LoyaltyTransactionMapper
{
    /**
     * @param $data
     * @return LoyaltyTransaction[]
     * @throws Exception
     */
    public function map($data): array
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
