<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Enums\DeletionType;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\ContactCollectionMapper;
use Piggy\Api\Mappers\Contacts\ContactSearchMapper;
use Piggy\Api\Models\Contact\ContactSearch;
use Piggy\Api\Models\Referral\Contact;
use Piggy\Api\Traits\Endpoints\ResponseToModelCollectionMapper;
use Piggy\Api\Traits\Endpoints\ResponseToModelMapper;

class ContactsEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelCollectionMapper<Contact> */
    use ResponseToModelCollectionMapper;

    /** @template-use ResponseToModelMapper<Contact> */
    use ResponseToModelMapper;

    protected string $resourceUri = 'contacts';

    /**
     * List all contacts.
     *
     * @param  mixed[]  $params
     * @return Contact[]
     *
     * @throws PiggyRequestException
     */
    public function list(
        ?int $limit = null,
        array $params = []
    ): array {
        $params['limit'] = $limit;

        $response = $this->client->get($this->resourceUri, $params);

        return self::mapToList(
            response: $response,
            mapper: ContactCollectionMapper::class
        );
    }

    /**
     * Show a single contact
     *
     * @throws PiggyRequestException
     */
    public function show(string $uuid): ContactSearch
    {
        $response = $this->client->get("$this->resourceUri/$uuid");

        return self::mapToModel(
            response: $response,
            mapper: ContactSearchMapper::class
        );
    }

    /**
     * Find a contact by email
     *
     * @throws PiggyRequestException
     */
    public function find(string $email): ?ContactSearch
    {
        $response = $this->client->get("$this->resourceUri/find-one-by", [
            'email' => $email,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: ContactSearchMapper::class
        );
    }

    /**
     * @param  mixed[]  $attributes
     *
     * @throws PiggyRequestException
     */
    public function update(string $uuid, array $attributes): ContactSearch
    {
        $response = $this->client->put("$this->resourceUri/$uuid", [
            'attributes' => $attributes,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: ContactSearchMapper::class
        );
    }

    /**
     * Create a new contact
     *
     * @throws PiggyRequestException
     */
    public function create(string $email, ?string $referralCode = null): ContactSearch
    {
        $response = $this->client->post($this->resourceUri, [
            'email' => $email,
            'referral_code' => $referralCode,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: ContactSearchMapper::class
        );
    }

    /**
     * @throws PiggyRequestException
     */
    public function createAsync(string $email, ?string $referralCode = null): ContactSearch
    {
        $response = $this->client->post("$this->resourceUri/async", [
            'email' => $email,
            'referral_code' => $referralCode,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: ContactSearchMapper::class
        );
    }

    /**
     * Find a contact by email, or create a new one if it doesn't exist
     *
     * @throws PiggyRequestException
     */
    public function findOrCreate(string $email): ContactSearch
    {
        $response = $this->client->post("$this->resourceUri/find-or-create", [
            'email' => $email,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: ContactSearchMapper::class
        );
    }

    /**
     * Find a contact by email, or create a new one if it doesn't exist (async)
     *
     * @throws PiggyRequestException
     */
    public function findOrCreateAsync(string $email): ContactSearch
    {
        $response = $this->client->post("$this->resourceUri/find-or-create/async", [
            'email' => $email,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: ContactSearchMapper::class
        );
    }

    /**
     * Create an anonymous contact
     *
     * @throws PiggyRequestException
     */
    public function createAnonymously(?string $contactIdentifierValue = null): ContactSearch
    {
        $response = $this->client->post("$this->resourceUri/anonymous", [
            'contact_identifier_value' => $contactIdentifierValue,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: ContactSearchMapper::class
        );
    }

    /**
     * Claim an anonymous contact
     *
     * @throws PiggyRequestException
     */
    public function claimAnonymousContact(string $uuid, string $email): ContactSearch
    {
        $response = $this->client->put("$this->resourceUri/$uuid/claim", [
            'email' => $email,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: ContactSearchMapper::class
        );
    }

    /**
     * Delete a contact
     *
     * @throws PiggyRequestException
     */
    public function delete(string $uuid, DeletionType $deletionType): true
    {
        $this->client->delete("$this->resourceUri/$uuid", [
            'type' => $deletionType->name,
        ]);

        return true;
    }
}
