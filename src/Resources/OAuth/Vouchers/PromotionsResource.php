<?php

namespace Piggy\Api\Resources\OAuth\Vouchers;

use Piggy\Api\Resources\Shared\Vouchers\BasePromotionsResource;

class PromotionsResource extends BasePromotionsResource
{
    /**
     * @var string
     */
    protected $resourceUri = '/api/v3/oauth/clients/promotions';
}
