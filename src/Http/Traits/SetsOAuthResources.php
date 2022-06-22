<?php

namespace Piggy\Api\Http\Traits;

use Piggy\Api\Http\BaseClient;
use Piggy\Api\Resources\OAuth\ContactIdentifiersResource;
use Piggy\Api\Resources\OAuth\Contacts\ContactsResource;
use Piggy\Api\Resources\OAuth\ContactSubscriptionsResource;
use Piggy\Api\Resources\OAuth\ContactVerificationResource;
use Piggy\Api\Resources\OAuth\Giftcards\GiftcardsResource;
use Piggy\Api\Resources\OAuth\Giftcards\GiftcardTransactionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\CreditReceptionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\LoyaltyCardsResource;
use Piggy\Api\Resources\OAuth\Loyalty\MembersResource;
use Piggy\Api\Resources\OAuth\Loyalty\Rewards\DigitalRewardReceptionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Rewards\ExternalRewardReceptionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Rewards\RewardReceptionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Rewards\RewardsResource;
use Piggy\Api\Resources\OAuth\Loyalty\StagedCreditReceptionsResource;
use Piggy\Api\Resources\OAuth\Marketing\MarketingRecipientsResource;
use Piggy\Api\Resources\OAuth\Shops\ShopsResource;
use Piggy\Api\Resources\OAuth\Shops\WebshopsResource;
use Piggy\Api\Resources\OAuth\SubscriptionTypesResource;

/**
 * Trait SetsOAuthResources
 * @package Piggy\Api\Http\Traits
 */
trait SetsOAuthResources
{
    /**
     * @var ContactsResource
     */
    public $contacts;

    /**
     * @var ContactIdentifiersResource
     */
    public $contactIdentifiers;

    /**
     * @var ContactVerificationResource
     */
    public $contactVerificationResource;

    /**
     * @var ContactSubscriptionsResource
     */
    public $contactSubscriptionsResource;

    /**
     * @var SubscriptionTypesResource
     */
    public $subscriptionTypesResource;

    /**
     * @var ShopsResource
     */
    public $shops;

    /**
     * @var CreditReceptionsResource
     */
    public $creditReceptions;

    /**
     * @var StagedCreditReceptionsResource
     */
    public $stagedCreditReceptions;

    /**
     * @var RewardsResource
     */
    public $rewards;

    /**
     * @var DigitalRewardReceptionsResource
     */
    public $digitalRewardReceptions;

    /**
     * @var ExternalRewardReceptionsResource
     */
    public $externalRewardReceptions;

    /**
     * @var RewardReceptionsResource
     */
    public $physicalRewardReceptions;

    /**
     * @var GiftcardsResource;
     */
    public $giftcards;

    /**
     * @var GiftcardTransactionsResource
     */
    public $giftcardTransactions;

    /**
     * @param BaseClient $client
     */
    protected function setResources(BaseClient $client)
    {
        $this->contacts = new ContactsResource($client);
        $this->contactIdentifiers = new ContactIdentifiersResource($client);
        $this->contactVerificationResource = new ContactVerificationResource($client);
        $this->contactSubscriptionsResource = new ContactSubscriptionsResource($client);
        $this->subscriptionTypesResource = new SubscriptionTypesResource($client);
        $this->shops = new ShopsResource($client);
        $this->creditReceptions = new CreditReceptionsResource($client);
        $this->stagedCreditReceptions = new StagedCreditReceptionsResource($client);
        $this->rewards = new RewardsResource($client);
        $this->digitalRewardReceptions = new DigitalRewardReceptionsResource($client);
        $this->externalRewardReceptions = new ExternalRewardReceptionsResource($client);
        $this->physicalRewardReceptions = new RewardReceptionsResource($client);
        $this->giftcards = new GiftcardsResource($client);
        $this->giftcardTransactions = new GiftcardTransactionsResource($client);
    }
}
