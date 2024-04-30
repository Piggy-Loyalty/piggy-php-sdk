<?php

namespace Piggy\Api\Models\ContactsPortal;

/**
 * Class Shop
 */
class ContactsPortalAuthUrl
{
    /**w
     * @var string
     */
    protected $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
