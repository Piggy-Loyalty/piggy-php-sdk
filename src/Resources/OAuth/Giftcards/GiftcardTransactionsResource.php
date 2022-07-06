<?php

namespace Piggy\Api\Resources\OAuth\Giftcards;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Giftcards\GiftcardTransactionMapper;
use Piggy\Api\Models\Giftcards\GiftcardTransaction;
use Piggy\Api\Resources\BaseResource;

/**
 * Class GiftcardTransactionsResource
 * @package Piggy\Api\Resources\OAuth\Giftcards
 */
class GiftcardTransactionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/giftcard-transactions";

    /**
     * @param string $giftcardTransactionUuid
     * @return GiftcardTransaction
     * @throws PiggyRequestException
     */
    public function get(string $giftcardTransactionUuid): GiftcardTransaction
    {
        $response = $this->client->get("$this->resourceUri/$giftcardTransactionUuid");

        $mapper = new GiftcardTransactionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $shopUuid
     * @param string $giftcardUuid
     * @param int $amountInCents
     * @return GiftcardTransaction
     * @throws PiggyRequestException
     */
    public function create(string $shopUuid, string $giftcardUuid, int $amountInCents): GiftcardTransaction
    {
        $response = $this->client->post($this->resourceUri, [
            "shop_uuid" => $shopUuid,
            "giftcard_uuid" => $giftcardUuid,
            "amount_in_cents" => $amountInCents,
        ]);

        $mapper = new GiftcardTransactionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $giftcardTransactionUuid
     * @return GiftcardTransaction
     * @throws PiggyRequestException
     */
    public function correct(string $giftcardTransactionUuid): GiftcardTransaction
    {
        $response = $this->client->post("$this->resourceUri/$giftcardTransactionUuid/correct", []);

        $mapper = new GiftcardTransactionMapper();

        return $mapper->map($response->getData());
    }
}
