<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\RewardAttributes;

use Piggy\Api\Enum\RewardAttributeDataTypes;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\RewardAttributes\RewardAttributeMapper;
use Piggy\Api\Mappers\Loyalty\RewardAttributes\RewardAttributesMapper;
use Piggy\Api\Models\Loyalty\RewardAttributes\RewardAttribute;
use Piggy\Api\Resources\BaseResource;

/**
 * Class RewardAttributesResource
 * @package Piggy\Api\Resources\OAuth
 */
class RewardAttributesResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/reward-attributes";

    /**
     * @param int $page
     * @param int $limit
     * @return array
     * @throws PiggyRequestException
     */
    public function list(int $page = 1, int $limit = 30): array
    {
        $response = $this->client->get($this->resourceUri, [
            "page" => $page,
            "limit" => $limit,
        ]);

        $mapper = new RewardAttributesMapper();

        return $mapper->map((array)$response->getData());
    }

    /**
     * @param string $name
     * @param string $label
     * @param string $dataType
     * @param null|string $description
     * @param null|array $options
     * @param null|string $placeholder

     * @return RewardAttribute
     * @throws PiggyRequestException
     */
    public function create(string $name, string $label, string $dataType, ?string $description = "", ?array $options = null, ?string $placeholder = null ): RewardAttribute

    {
        $rewardAttributes = [
            "name" => $name,
            "label" => $label,
            "dataType" => $dataType
        ];

        // Check datatype exists
        if (!RewardAttributeDataTypes::has($dataType)) {
            throw new \Exception("DataType {$dataType} invalid");
        }

//        if ($description != "") {
//            $rewardAttributes['description'] = $description;
//        }
//
//        if ($options != []) {
//            $rewardAttributes['options'] = $options;
//        }
//
//        if ($placeholder != null) {
//            $rewardAttributes['placeholder'] = $placeholder;
//        }

        $response = $this->client->post($this->resourceUri, $rewardAttributes);

        $mapper = new RewardAttributeMapper();

        return $mapper->map($response->getData());
    }
}