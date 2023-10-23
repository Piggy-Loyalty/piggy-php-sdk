<?php

namespace Piggy\Api\Models\Zapier;

class ZapierWebhook
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param int $id
     * @param string $type
     * @param string $url
     */
    public function __construct(int $id, string $type, string $url)
    {
        $this->id = $id;
        $this->type = $type;
        $this->url = $url;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
