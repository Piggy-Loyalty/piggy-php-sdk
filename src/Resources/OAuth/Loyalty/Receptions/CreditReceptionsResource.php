<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Receptions;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\InputInvalidException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use Piggy\Api\Resources\BaseResource;

/**
 * Class CreditReceptionsResource
 * @package Piggy\Api\Resources\OAuth
 */
class CreditReceptionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/credit-receptions";

    // @TODO remove this or implement if we have a get call on credit reception
//    /**
//     * @param int $id
//     * @return CreditReception
//     * @throws GuzzleException
//     * @throws PiggyRequestException
//     */
//    public function get(int $id): CreditReception
//    {
//        $response = $this->client->get("{$this->resourceUri}/{$id}", []);
//
//        $mapper = new CreditReceptionMapper();
//
//        return $mapper->map($response->getData());
//    }

    /**
     * @param string $shopUuid
     * @param string $contactUuid
     * @param int $unitValue
     * @return CreditReception
     * @throws GuzzleException
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
