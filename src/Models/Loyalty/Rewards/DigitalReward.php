<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

class DigitalReward extends Reward
{
    /**
     * @var array|null
     */
    protected $meta;

    /**
     * DigitalReward constructor.
     *
     * @param int $id
     * @param string $title
     * @param int|null $requiredCredits
     * @param array|null $meta
     */
    public function __construct(int $id, string $title, ?int $requiredCredits = null, array $meta = null)
    {
        parent::__construct($id, $title, $requiredCredits);

        $this->meta = $meta;
    }

    /**
     * @return array|null
     */
    public function getMeta(): ?array
    {
        return $this->meta;
    }

    /**
     * @param array|null $meta
     */
    public function setMeta(?array $meta): void
    {
        $this->meta = $meta;
    }
}
