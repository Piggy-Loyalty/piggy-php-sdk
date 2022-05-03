<?php

namespace Piggy\Api\Http\Traits;

use Piggy\Api\Http\BaseClient;
use Piggy\Api\Resources\OAuth\Loyalty\MembersResource;
use Piggy\Api\Resources\Register\Contacts\ContactsResource;
use Piggy\Api\Resources\Register\Registers\RegisterResource;

/**
 * Trait SetsRegisterResources
 * @package Piggy\Api\Http\Traits
 */
trait SetsRegisterResources
{
    /**
     * @var MembersResource
     */
    public $members;

    public $contacts;

    public $registers;

    /**
     * @param BaseClient $client
     */
    protected function setResources(BaseClient $client)
    {
        $this->members = new MembersResource($client); // oauth members resource? does this work?
        $this->contacts = new ContactsResource($client);
        $this->registers = new RegisterResource($client);
    }
}
