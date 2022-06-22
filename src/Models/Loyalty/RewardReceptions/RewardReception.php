<?php

namespace Piggy\Api\Models\Loyalty\RewardReceptions;

use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Loyalty\CreditBalance;
use Piggy\Api\Models\Loyalty\Member;
use Piggy\Api\Models\Loyalty\Rewards\Reward;

/**
 * Class RewardReception
 * @package Piggy\Api\Models\Loyalty\RewardReceptions
 */
class RewardReception
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var CreditBalance
     */
    protected $credits;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var Reward
     */
    protected $reward;

    /**
     * RewardReception constructor.
     * @param int $id
     * @param string $title
     * @param int $credits
     * @param Contact $contact
     */
    public function __construct(int $id, string $title, CreditBalance $credits, Contact $contact)
    {
        $this->id = $id;
        $this->title = $title;
        $this->credits = $credits;
        $this->contact = $contact;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return CreditBalance
     */
    public function getCredits(): CreditBalance
    {
        return $this->credits;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }
}
