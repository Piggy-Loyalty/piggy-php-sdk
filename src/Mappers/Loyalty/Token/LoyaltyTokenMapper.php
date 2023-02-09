<?php

namespace Piggy\Api\Mappers\Loyalty\Token;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Models\Loyalty\LoyaltyToken;
use stdClass;

/**
 * Class LoyaltyTokenMapper
 * @package Piggy\Api\Mappers\Loyalty\Token
 */
class LoyaltyTokenMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return LoyaltyToken
     */
    public function map(stdClass $data): LoyaltyToken
    {
        return new LoyaltyToken(
            $data->data
        );
    }
}