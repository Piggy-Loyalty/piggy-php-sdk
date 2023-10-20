<?php

namespace Piggy\Api\Models\PortalSessions;

use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Shops\Shop;

class PortalSession
{
    protected $uuid;
    protected $url;
    protected $contact;
    public $shop;
    protected $createdAt;

    public function __construct(
        string   $url,
        string   $uuid,
        Shop     $shop,
        string $createdAt,
        ?Contact  $contact
    )
    {
        $this->url = $url;
        $this->uuid = $uuid;
        $this->shop = $shop;
        $this->createdAt = $createdAt;
        $this->contact = $contact;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }

    public function getShop(): Shop
    {
        return $this->shop;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

}
