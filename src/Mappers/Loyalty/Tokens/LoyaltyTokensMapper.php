<?php

namespace Piggy\Api\Mappers\Loyalty\Tokens;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Mappers\Shops\ShopMapper;
use Piggy\Api\Mappers\Units\UnitMapper;
use Piggy\Api\Models\Loyalty\LoyaltyTokens;
use stdClass;

/**
 * Class LoyaltyTokensMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class LoyaltyTokensMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return LoyaltyTokens
     */
    public function map(stdClass $data): LoyaltyTokens
    {
        $shopMapper = new ShopMapper();
        $unitMapper = new UnitMapper();
        $shop = $shopMapper->map($data->shop);

        if (isset($data->unit)) {
            $unit = $unitMapper->map($data->unit);
        } else {
            $unit = null;
        }

        return new LoyaltyTokens(
            $data->type,
            $data->credits,
            $data->uuid,
            $shop,
            $this->parseDate($data->created_at)
        );
    }
}

