<?php

namespace Piggy\Api\Models\Loyalty;

use DateTime;
use Exception;

/**
 * Class StagedCreditReception
 * @package Piggy\Api\Models\Loyalty
 */
class StagedCreditReception
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $hash;

    /**
     * @var int|null
     */
    protected $credits;

    /**
     * @var int|null
     */
    protected $purchaseAmount;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var CreditReception|null
     */
    protected $creditReception;

    /**
     * StagedCreditReception constructor.
     * @param int $id
     * @param string $url
     * @param string $hash
     * @param int|null $credits
     * @param int|null $purchaseAmount
     * @param string $createdAt
     * @param CreditReception|null $creditReception
     * @throws Exception
     */
    public function __construct(
        int $id,
        string $url,
        string $hash,
        ?int $credits,
        ?int $purchaseAmount,
        string $createdAt,
        ?CreditReception $creditReception = null
    ) {
        $this->id = $id;
        $this->url = $url;
        $this->hash = $hash;
        $this->credits = $credits;
        $this->purchaseAmount = $purchaseAmount;
        $this->createdAt = new DateTime($createdAt);
        $this->creditReception = $creditReception;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return int|null
     */
    public function getCredits(): ?int
    {
        return $this->credits;
    }

    /**
     * @return int|null
     */
    public function getPurchaseAmount(): ?int
    {
        return $this->purchaseAmount;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return CreditReception|null
     */
    public function getCreditReception(): ?CreditReception
    {
        return $this->creditReception;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
