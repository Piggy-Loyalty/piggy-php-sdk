<?php

namespace Piggy\Api\Models\Giftcards;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Environment;
use Piggy\Api\Mappers\Giftcards\GiftcardProgramsMapper;

class GiftcardProgram
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $active;

    protected static $resourceUri = "/api/v3/oauth/clients/giftcard-programs";

    protected static $mapper = GiftcardProgramsMapper::class;

    /**
     * GiftcardProgram constructor.
     * @param string $uuid
     * @param string $name
     * @param bool $active
     */
    public function __construct(string $uuid, string $name, bool $active)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return array
     * @throws GuzzleException
     */
    public static function list(): array
    {
        $response = Environment::get(self::$resourceUri);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}