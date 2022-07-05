<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Receptions;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use Piggy\Api\Resources\BaseResource;

/**
 * Class CreditReceptionsResource
 * @package Piggy\Api\Resources\OAuth\Loyalty\Receptions
 */
class CreditReceptionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/credit-receptions";

    /**
     * @param string $contactUuid
     * @param string $shopUuid
     * @param int $unitValue
     *
     * @return CreditReception
     * @throws PiggyRequestException
     */
    public function create(
        string $contactUuid,
        string $shopUuid,
        int    $unitValue
    ): CreditReception
    {
        $response = $this->client->post($this->resourceUri, [
            "shop_uuid" => $shopUuid,
            "contact_uuid" => $contactUuid,
            "unit_value" => $unitValue
        ]);

        $mapper = new CreditReceptionMapper();

        return $mapper->map($response->getData());
    }
}
