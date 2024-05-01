<?php

namespace Piggy\Api\Http\Traits;

use Piggy\Api\Http\BaseClient;
use Piggy\Api\Resources\Register\ContactIdentifiersResource;
use Piggy\Api\Resources\Register\Contacts\ContactsResource;
use Piggy\Api\Resources\Register\Giftcards\GiftcardsResource;
use Piggy\Api\Resources\Register\Giftcards\GiftcardTransactionsResource;
use Piggy\Api\Resources\Register\Loyalty\Program\LoyaltyProgramResource;
use Piggy\Api\Resources\Register\Loyalty\Receptions\CreditReceptionsResource;
use Piggy\Api\Resources\Register\Loyalty\Receptions\RewardReceptionsResource;
use Piggy\Api\Resources\Register\Loyalty\Rewards\RewardsResource;
use Piggy\Api\Resources\Register\PrepaidTransactionResource;
use Piggy\Api\Resources\Register\Registers\RegisterResource;

/**
 * Trait SetsRegisterResources
 */
trait SetsRegisterResources
{
    /**
     * @var ContactsResource
     */
    public $contacts;

    /**
     * @var RegisterResource
     */
    public $registers;

    /**
     * @var GiftcardsResource
     */
    public $giftcards;

    /**
     * @var RewardsResource
     */
    public $rewards;

    /**
     * @var ContactIdentifiersResource
     */
    public $contactIdentifiers;

    /**
     * @var GiftcardTransactionsResource
     */
    public $giftcardTransactions;

    /**
     * @var PrepaidTransactionResource
     */
    public $prepaidTransactions;

    /**
     * @var RewardReceptionsResource
     */
    public $rewardReceptions;

    /**
     * @var CreditReceptionsResource
     */
    public $creditReceptions;

    /** @var LoyaltyProgramResource */
    public $loyaltyProgram;

    protected function setResources(BaseClient $client): void
    {
        $this->registers = new RegisterResource($client);
        $this->contacts = new ContactsResource($client);
        $this->giftcards = new GiftcardsResource($client);
        $this->rewards = new RewardsResource($client);
        $this->contactIdentifiers = new ContactIdentifiersResource($client);
        $this->giftcardTransactions = new GiftcardTransactionsResource($client);
        $this->prepaidTransactions = new PrepaidTransactionResource($client);
        $this->rewardReceptions = new RewardReceptionsResource($client);
        $this->creditReceptions = new CreditReceptionsResource($client);
        $this->loyaltyProgram = new LoyaltyProgramResource($client);
    }
}
