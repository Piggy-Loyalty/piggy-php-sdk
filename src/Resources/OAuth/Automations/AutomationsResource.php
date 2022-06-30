<?php

namespace Piggy\Api\Resources\OAuth\Automations;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Automations\AutomationMapper;
use Piggy\Api\Mappers\Automations\AutomationsMapper;
use Piggy\Api\Models\Automations\Automation;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ShopsResource
 * @package Piggy\Api\Resources\OAuth\Shops
 */
class AutomationsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/automations";

    /**
     * @return array
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function list(): array
    {
        $response = $this->client->get($this->resourceUri, []);

        $mapper = new AutomationsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $contactUuid
     * @param string $automationUuid
     * @return Automation
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function get(string $contactUuid, string $automationUuid): Automation
    {
        $response = $this->client->post("$this->resourceUri/runs", [
            "contact_uuid" => $contactUuid,
            "automation_uuid" => $automationUuid
        ]);

        $mapper = new AutomationMapper();

        return $mapper->map($response->getData());
    }
}
