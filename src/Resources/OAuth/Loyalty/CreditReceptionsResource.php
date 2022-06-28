<?php

namespace Piggy\Api\Resources\OAuth\Loyalty;

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
     * @param string|null $contactUuid
     * @param string|null $contactIdentifier
     * @param string|null $unitValue
     * @param string|null $unitName
     * @param int|null $credits
     *
     * @return CreditReception
     * @throws GuzzleException
     * @throws InputInvalidException
     * @throws PiggyRequestException
     */
    public function create(
        string $shopUuid,
        string $contactUuid = null,
        string $contactIdentifier = null,
        string $unitValue = null,
        string $unitName = null,
        int $credits = null
    ): CreditReception {
        if(!$contactUuid && !$contactIdentifier) {
            throw new InputInvalidException("ContactUUID or ContactIdentifier is required");
        }
        if(!$credits && !$unitValue) {
            throw new InputInvalidException("Unit value or credits is required");
        }

        $response = $this->client->post($this->resourceUri, [
            "shop_uuid" => $shopUuid,
            "contact_uuid" => $contactUuid,
            "contact_identifier_value" => $contactIdentifier,
            "unit_value" => $unitValue,
            "unit_name" => $unitName,
            "credits" => $credits,
        ]);

        $mapper = new CreditReceptionMapper();

        return $mapper->map($response->getData());
    }
}
