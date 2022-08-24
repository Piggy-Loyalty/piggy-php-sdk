<?php

namespace Piggy\Api\Models\Loyalty;

/**
 * Class LoyaltyProgram
 * @package Piggy\Api\Models\Loyalty
 */
class LoyaltyProgram
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    private $customCreditName;
    /**
     * @var int|null
     */
    private $maxAmount;

    /**
     * @param int $id
     * @param string $name
     * @param int|null $maxAmount
     * @param string $customCreditName
     */
    public function __construct(int $id, string $name, ?int $maxAmount = null, string $customCreditName = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->customCreditName = $customCreditName;
        $this->maxAmount = $maxAmount;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCustomCreditName(): string
    {
        return $this->customCreditName;
    }

    /**
     * @return int|null
     */
    public function getMaxAmount(): ?int
    {
        return $this->maxAmount;
    }
}
