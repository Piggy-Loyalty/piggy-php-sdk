<?php

namespace Piggy\Api\Resources\OAuth\Loyalty;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\InputInvalidException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Exceptions\RequestException;
use Piggy\Api\Mappers\Loyalty\StagedCreditReceptionMapper;
use Piggy\Api\Models\Loyalty\StagedCreditReception;
use Piggy\Api\Resources\BaseResource;
use stdClass;

/**
 * Class StagedCreditReceptionsResource
 * @package Piggy\Api\Resources\OAuth\Loyalty
 */
class StagedCreditReceptionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v2/oauth/clients/staged-credit-receptions";

    /**
     * @param int $id
     * @return StagedCreditReception
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function get(int $id): StagedCreditReception
    {
        $response = $this->client->get("{$this->resourceUri}/{$id}");

        $mapper = new StagedCreditReceptionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param int $shopId
     * @param int|null $credits
     * @param float|null $purchaseAmount
     * @return StagedCreditReception
     * @throws InputInvalidException
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function create(int $shopId, int $credits = null, float $purchaseAmount = null): StagedCreditReception
    {
        if(!$credits && !$purchaseAmount) {
            throw new InputInvalidException("Purchase amount or credits is required");
        }

        $response = $this->client->post($this->resourceUri, [
            "shop_id" => $shopId,
            "credits" => $credits,
            "purchase_amount" => $purchaseAmount,
        ]);
        
        $mapper = new StagedCreditReceptionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param int $stagedCreditReceptionId
     * @param string $email
     * @param null $locale
     *
     * @return stdClass
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function send(int $stagedCreditReceptionId, string $email, $locale = null)
    {
        $response = $this->client->post("{$this->resourceUri}/{$stagedCreditReceptionId}/send", [
            "email" => $email,
            "locale" => $locale
        ]);

        return $response->getData();
    }
}
