<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

/**
 * Class DigitalRewardCode
 */
class DigitalRewardCode
{
    /**
     * @var string
     */
    protected $code;

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
