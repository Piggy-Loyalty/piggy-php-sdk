<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

/**
 * Class LoyaltyProgram
 * @package Piggy\Api\Models\Loyalty
 */
class DigitalRewardCode
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @param string $code
     */
    public function __construct(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }
}
