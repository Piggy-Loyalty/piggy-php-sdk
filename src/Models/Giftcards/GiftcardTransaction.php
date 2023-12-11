<?php

namespace Piggy\Api\Models\Giftcards;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Shops\Shop;
use Piggy\Api\StaticMappers\Giftcards\GiftcardTransactionMapper;
use Piggy\Api\StaticMappers\Giftcards\GiftcardTransactionsMapper;
use stdClass;

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
     * @var Shop|null
     */
    protected $shop;

    /**
     * @var stdClass|null
     */
    protected $card;

    /**
     * @var string
     */
    const resourceUri = "/api/v3/oauth/clients/giftcard-transactions";

    /**
     * @param string $uuid
     * @param int $amountInCents
     * @param DateTime $createdAt
     * @param string|null $type
     * @param bool|null $settled
     * @param int|null $cardId
     * @param int|null $shopId
     * @param array $settlements
     * @param int|null $id
     * @param Shop|null $shop
     * @param stdClass|null $card
     */
    public function __construct(
        string   $uuid,
        int      $amountInCents,
        DateTime $createdAt,
        ?string  $type = null,
        ?bool    $settled = null,
        ?int     $cardId = null,
        ?int     $shopId = null,
        array    $settlements = [],
        ?int     $id = null,
        ?Shop    $shop = null,
        ?stdClass $card = null
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
        $this->shop = $shop;
        $this->card = $card;
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

    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    /**
     * @return string
     */
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

    public function getCard(): ?stdClass
    {
        return $this->card;
    }

    /**
     * @param string $giftcardTransactionUuid
     * @param array $params
     * @return GiftcardTransaction
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function get(string $giftcardTransactionUuid, array $params = []): GiftcardTransaction
    {
        $response = ApiClient::get(self::resourceUri . "/$giftcardTransactionUuid", $params);

        return GiftcardTransactionMapper::map($response->getData());
    }

    /**
     * @param array $body
     * @return GiftcardTransaction
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $body): GiftcardTransaction
    {
        $response = ApiClient::post(self::resourceUri, $body);

        return GiftcardTransactionMapper::map($response->getData());
    }

    /**
     * @param string $giftcardTransactionUuid
     * @param array $body
     * @return GiftcardTransaction
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function correct(string $giftcardTransactionUuid, array $body = []): GiftcardTransaction
    {
        $response = ApiClient::post(self::resourceUri . "/$giftcardTransactionUuid/correct", $body);

        return GiftcardTransactionMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(array $params): array
    {
        $response = ApiClient::get(self::resourceUri, $params);

        return GiftcardTransactionsMapper::map((array)$response->getData());
    }
}