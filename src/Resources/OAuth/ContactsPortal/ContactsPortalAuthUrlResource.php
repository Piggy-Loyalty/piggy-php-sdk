<?php

namespace Piggy\Api\Resources\OAuth\ContactsPortal;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\ContactsPortal\ContactsPortalAuthUrlMapper;
use Piggy\Api\Models\ContactsPortal\ContactsPortal;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactsPortalAuthUrlResource
 * @package Piggy\Api\Resources\OAuth\ContactsPortal
 * @deprecated
 */
class ContactsPortalAuthUrlResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/contacts-portal";

    /**
     * @param string $contactUuid
     * @return ContactsPortal
     * @throws PiggyRequestException
     */
    public function get(string $contactUuid): ContactsPortal
    {
        $response = $this->client->get("$this->resourceUri/auth-url", [
            "contact_uuid" => $contactUuid
        ]);

        $mapper = new ContactsPortalAuthUrlMapper();

        return $mapper->map($response->getData());
    }
}
