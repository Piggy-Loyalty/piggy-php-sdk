<?php

namespace Piggy\Api\Mappers\Loyalty\Tokens;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Mappers\Shops\ShopMapper;
use Piggy\Api\Mappers\Units\UnitMapper;
use Piggy\Api\Models\Loyalty\LoyaltyToken;
use stdClass;

/**
 * Class LoyaltyTokensMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class LoyaltyTokenMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return LoyaltyToken
     */
    public function map(stdClass $data): LoyaltyToken
    {
        $shopMapper = new ShopMapper();
        $shop = $shopMapper->map($data->shop);

        return new LoyaltyToken(
            $data->type,
            $data->credits,
            $data->uuid,
            $shop,
            $this->parseDate($data->created_at)
        );
    }
}

