<?php

namespace Piggy\Api\Models\ContactsPortal;

/**
 * Class Shop
 * @package Piggy\Api\Models\Shops
 */
class ContactsPortalAuthUrl
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
