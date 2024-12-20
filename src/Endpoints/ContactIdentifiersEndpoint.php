<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\ContactIdentifierMapper;
use Piggy\Api\Models\Contact\ContactIdentifier;
use Piggy\Api\Traits\Endpoints\ResponseToModelCollectionMapper;
use Piggy\Api\Traits\Endpoints\ResponseToModelMapper;

class ContactIdentifiersEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelCollectionMapper<ContactIdentifier> */
    use ResponseToModelCollectionMapper;

    /** @template-use ResponseToModelMapper<ContactIdentifier> */
    use ResponseToModelMapper;

    protected string $resourceUri = 'contact-identifiers';

    /**
     * Create a new contact identifier.
     *
     * @throws PiggyRequestException
     */
    public function create(
        string $value,
        ?string $name = null,
        bool $active = true,
        ?string $contactUuid = null
    ): ContactIdentifier {
        $response = $this->client->post($this->resourceUri, [
            'name' => $name,
            'value' => $value,
            'active' => $active,
            'contact_uuid' => $contactUuid,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: ContactIdentifierMapper::class
        );
    }

    /**
     * Show a contact identifier.
     *
     * @throws PiggyRequestException
     */
    public function show(string $value): ContactIdentifier
    {
        $response = $this->client->get("$this->resourceUri/$value");

        return self::mapToModel(
            response: $response,
            mapper: ContactIdentifierMapper::class
        );
    }

    /**
     * Update a contact identifier.
     *
     * @throws PiggyRequestException
     */
    public function update(
        string $value,
        ?string $name = null,
        ?bool $active = null,
    ): ContactIdentifier {
        $response = $this->client->put("$this->resourceUri/$value", [
            'name' => $name,
            'active' => $active,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: ContactIdentifierMapper::class
        );
    }

    /**
     * Delete a contact identifier.
     *
     * @throws PiggyRequestException
     */
    public function delete(string $value): true
    {
        $this->client->delete("$this->resourceUri/$value");

        return true;
    }
}
