<?php

namespace Piggy\Api\Resources\OAuth\Giftcards;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Giftcards\GiftcardMapper;
use Piggy\Api\Models\Giftcards\Giftcard;
use Piggy\Api\Resources\BaseResource;

/**
 * Class GiftcardsResource
 * @package Piggy\Api\Resources\OAuth\Loyalty
 */
class GiftcardsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/giftcards";

    /**
     * @param string $shopUuid
     * @param string $hash
     * @return Giftcard
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function findOneBy(string $shopUuid, string $hash): Giftcard
    {
        $response = $this->client->get("{$this->resourceUri}/find-one-by", [
            "shop_uuid" => $shopUuid,
            "hash" => $hash,
        ]);

        $mapper = new GiftcardMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $shopUuid
     * @param string $giftcardProgramUuid
     * @param int $type
     *
     * @return Giftcard
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function create(string $shopUuid, string $giftcardProgramUuid, int $type): Giftcard
    {
        $response = $this->client->post($this->resourceUri, [
            "shop_uuid" => $shopUuid,
            "giftcard_program_uuid" => $giftcardProgramUuid,
            "type" => $type
        ]);

        $mapper = new GiftcardMapper();

        return $mapper->map($response->getData());
    }
}
