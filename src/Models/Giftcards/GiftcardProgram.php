<?php

namespace Piggy\Api\Models\Giftcards;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Giftcards\GiftcardProgramsMapper;

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

    /**
     * @var ?int
     */
    protected $max_amount_in_cents;

    /**
     * @var ?string
     */
    protected $calculator_flow;

    /**
     * @var ?int
     */
    protected $expiration_days;

    const resourceUri = '/api/v3/oauth/clients/giftcard-programs';

    /**
     * GiftcardProgram constructor.
     */
    public function __construct(string $uuid, string $name, bool $active, ?int $max_amount_in_cents, ?string $calculator_flow, ?int $expiration_days)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->active = $active;
        $this->max_amount_in_cents = $max_amount_in_cents;
        $this->calculator_flow = $calculator_flow;
        $this->expiration_days = $expiration_days;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getMaxAmountInCents(): ?int
    {
        return $this->max_amount_in_cents;
    }

    public function getCalculatorFlow(): ?string
    {
        return $this->calculator_flow;
    }

    public function getExpirationDays(): ?int
    {
        return $this->expiration_days;
    }

    /**
     * @return GiftcardProgram[]
     *
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(): array
    {
        $response = ApiClient::get(self::resourceUri);

        return GiftcardProgramsMapper::map($response->getData());
    }
}
