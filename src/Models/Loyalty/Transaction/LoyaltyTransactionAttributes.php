<?php

namespace Piggy\Api\Models\Loyalty\Transaction;

use DateTime;

/**
 * Class CreditReception
 * @package Piggy\Api\Models
 */
class LoyaltyTransactionAttributes
{

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /**
     * @var string|null
     */
    public $label;

    /**
     * @var string
     */
    public $createdByUser;

    /**
     * @var string
     */
    public $type;

    /**
     * @var DateTime
     */
    public $dateTime;

    public function __construct(int $id, string $name, string $label, string $createdByUser, string $type, DateTime $dateTime)
    {

        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->createdByUser = $createdByUser;
        $this->type = $type;
        $this->dateTime = $dateTime;

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getCreatedByUser(): string
    {
        return $this->createdByUser;
    }

    /**
     * @return DateTime
     */
    public function getDateTime(): DateTime
    {
        return $this->dateTime;
    }




}