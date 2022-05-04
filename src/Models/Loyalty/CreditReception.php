<?php

namespace Piggy\Api\Models\Loyalty;

use DateTime;
use Exception;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Contacts\ContactIdentifier;

/**
 * Class CreditReception
 * @package Piggy\Api\Models
 */
class CreditReception
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $credits;

    /**s
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var Contact|null
     */
    private $contact;

    /**
     * @var ContactIdentifier|null
     */
    private $identifier;

    /**
     * @var string|null
     */
    private $unitValue;

    /**
     * @param int $id
     * @param int $credits
     * @param string $createdAt
     * @param string|null $unitValue
     * @param Contact $contact
     * @param ContactIdentifier|null $identifier
     *
     * @throws Exception
     */
    public function __construct(int $id, int $credits, string $createdAt, Contact $contact, ?ContactIdentifier $identifier, string $unitValue = null)
    {
        $this->id = $id;
        $this->credits = $credits;
        $this->createdAt = new DateTime($createdAt);
        $this->unitValue = $unitValue;
        $this->contact = $contact;
        $this->identifier = $identifier;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCredits(): int
    {
        return $this->credits;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return string|null
     */
    public function getUnitValue(): ?string
    {
        return $this->unitValue;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }
}
