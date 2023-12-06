<?php

namespace Piggy\Api\Resources\OAuth;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Prepaid\PrepaidTransactionMapper;
use Piggy\Api\Models\Prepaid\PrepaidTransaction;
use Piggy\Api\Resources\BaseResource;

/**
 * Class PrepaidTransactionsResource
 * @package Piggy\Api\Resources\OAuth
 * @deprecated
 */
class PrepaidTransactionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/prepaid-transactions";

    /**
     * @param string $contactUuid
     * @param int $amountInCents
     * @param string $shopUuid
     *
     * @return PrepaidTransaction
     * @throws PiggyRequestException
     */
    public function create(string $contactUuid, int $amountInCents, string $shopUuid): PrepaidTransaction
    {
        $response = $this->client->post("$this->resourceUri", [
            "contact_uuid" => $contactUuid,
            "amount_in_cents" => $amountInCents,
            "shop_uuid" => $shopUuid
        ]);

        $mapper = new PrepaidTransactionMapper();

        return $mapper->map($response->getData());
    }
}
