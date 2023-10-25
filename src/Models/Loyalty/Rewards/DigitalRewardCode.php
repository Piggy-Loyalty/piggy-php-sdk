<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

/**
 * Class DigitalRewardCode
 * @package Piggy\Api\Models\Loyalty\Rewards
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
