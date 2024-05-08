<?php

namespace Piggy\Api\Models\ContactsPortal;

class ContactsPortal
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/contacts-portal';

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
