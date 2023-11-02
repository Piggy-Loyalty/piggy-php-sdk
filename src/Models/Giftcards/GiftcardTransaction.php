<?php

namespace Piggy\Api\Models\Giftcards;

use DateTime;
use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Giftcards\GiftcardMapper;
use Piggy\Api\Mappers\Giftcards\GiftcardTransactionMapper;
use Piggy\Api\Mappers\Giftcards\GiftcardTransactionsMapper;

/**
 * Class GiftcardTransaction
 * @package Piggy\Api\Models\Giftcards
 */
class GiftcardTransaction
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var int
     */
    protected $amount_in_cents;

    /**
     * @var DateTime
     */
    protected $created_at;

    /**
     * @var Giftcard
     */
    protected $card_id;

    /**
     * @var int
     */
    protected $shop_id;

    /**
     * @var bool
     */
    protected $settled;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var GiftcardTransactionSettlement[]
     */
    protected $settlements = [];

    /**
     * @var int|null
     */
    protected $id;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/giftcard-transactions";


    protected static $mapper = GiftcardTransactionMapper::class;


    public function __construct(
        string   $uuid,
        int      $amountInCents,
        DateTime $createdAt,
        ?string  $type = null,
        ?bool    $settled = null,
        ?int     $cardId = null,
        ?int     $shopId = null,
        array    $settlements = [],
        ?int     $id = null
    )
    {
        $this->uuid = $uuid;
        $this->amount_in_cents = $amountInCents;
        $this->created_at = $createdAt;
        $this->type = $type;
        $this->settled = $settled;
        $this->card_id = $cardId;
        $this->shop_id = $shopId;
        $this->settlements = $settlements;
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
    public function getAmountInCents(): int
    {
        return $this->amount_in_cents;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @return int
     */
    public function getGiftcardId(): int
    {
        return $this->card_id;
    }

    /**
     * @return int
     */
    public function getShopId(): int
    {
        return $this->shop_id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isSettled(): bool
    {
        return $this->settled;
    }

    /**
     * @return array
     */
    public function getSettlements(): array
    {
        return $this->settlements;
    }

    /**
     * @return int | null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public static function get(string $giftcardTransactionUuid, array $params = []): GiftcardTransaction
    {
        $response = Environment::get(self::$resourceUri . "/$giftcardTransactionUuid", $params);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    public static function create(array $body): GiftcardTransaction
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    public static function correct(string $giftcardTransactionUuid, array $body = []): GiftcardTransaction
    {
        $response = Environment::post(self::$resourceUri . "/$giftcardTransactionUuid/correct", $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    public static function list(array $params): array
    {
        $response = Environment::get(self::$resourceUri, $params);

        $mapper = new GiftcardTransactionsMapper();

        return $mapper->map((array)$response->getData());
    }
}