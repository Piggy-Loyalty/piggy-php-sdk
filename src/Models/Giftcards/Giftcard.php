<?php

namespace Piggy\Api\Models\Giftcards;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Giftcards\GiftcardMapper;

/**
 * Class Giftcard
 * @package Piggy\Api\Models\Giftcards
 */
class Giftcard
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $uuid;

    /**
     * @var int
     */
    public $type;

    /**
     * @var string;
     */
    public $hash;

    /**
     * @var DateTime|null
     */
    public $expirationDate;

    /**
     * @var bool
     */
    public $active;

    /**
     * @var bool
     */
    public $upgradeable;

    /**
     * @var GiftcardProgram
     */
    public $giftcardProgram;

    /**
     * @var int
     */
    public $amountInCents;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/giftcards";

    /**
     * @param string $uuid
     * @param string $hash
     * @param int $amountInCents
     * @param int $type
     * @param bool $active
     * @param bool $upgradeable
     * @param GiftcardProgram|null $giftcardProgram
     * @param DateTime|null $expirationDate
     * @param int|null $id
     */
    public function __construct(string $uuid, string $hash, int $amountInCents, int $type, bool $active, bool $upgradeable, ?GiftcardProgram $giftcardProgram, ?DateTime $expirationDate, ?int $id)
    {
        $this->uuid = $uuid;
        $this->hash = $hash;
        $this->amountInCents = $amountInCents;
        $this->type = $type;
        $this->active = $active;
        $this->upgradeable = $upgradeable;
        $this->giftcardProgram = $giftcardProgram;
        $this->expirationDate = $expirationDate;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return DateTime|null
     */
    public function getExpirationDate(): ?DateTime
    {
        return $this->expirationDate;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isUpgradeable(): bool
    {
        return $this->upgradeable;
    }

    /**
     * @return GiftcardProgram|null
     */
    public function getGiftcardProgram(): ?GiftcardProgram
    {
        return $this->giftcardProgram;
    }

    /**
     * @return int
     */
    public function getAmountInCents(): int
    {
        return $this->amountInCents;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param array $params
     * @return Giftcard
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function find(array $params): Giftcard
    {
        $response = ApiClient::get(self::$resourceUri . "/find-one-by", $params);

        return GiftcardMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return Giftcard
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $params): Giftcard
    {
        $response = ApiClient::post(self::$resourceUri, $params);

        return GiftcardMapper::map($response->getData());
    }
}