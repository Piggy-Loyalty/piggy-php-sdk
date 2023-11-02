<?php

namespace Piggy\Api\Models\Giftcards;

use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Giftcards\GiftcardProgramsMapper;

class GiftcardProgram
{
    /**
     * @var string
     */
    public $uuid;

    /**
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $active;

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
     * @throws PiggyRequestException
     */
    public static function list(): array
    {
        $response = Environment::get(self::$resourceUri);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

}