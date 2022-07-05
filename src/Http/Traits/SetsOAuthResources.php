<?php

namespace Piggy\Api\Http\Traits;

use Piggy\Api\Http\BaseClient;
use Piggy\Api\Resources\OAuth\Automations\AutomationsResource;
use Piggy\Api\Resources\OAuth\Contacts\ContactIdentifiersResource;
use Piggy\Api\Resources\OAuth\Contacts\ContactsResource;
use Piggy\Api\Resources\OAuth\Contacts\ContactVerificationResource;
use Piggy\Api\Resources\OAuth\ContactSubscriptionsResource;
use Piggy\Api\Resources\OAuth\Giftcards\GiftcardsResource;
use Piggy\Api\Resources\OAuth\Giftcards\GiftcardTransactionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Receptions\CreditReceptionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Receptions\LoyaltyTransactionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Receptions\RewardReceptionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Rewards\RewardsResource;
use Piggy\Api\Resources\OAuth\PrepaidTransactionResource;
use Piggy\Api\Resources\OAuth\Shops\ShopsResource;
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
    public $contactVerification;

    /**
     * @var ContactSubscriptionsResource
     */
    public $contactSubscriptions;

    /**
     * @var SubscriptionTypesResource
     */
    public $subscriptionTypes;

    /**
     * @var ShopsResource
     */
    public $shops;

    /**
     * @var CreditReceptionsResource
     */
    public $creditReceptions;

    /**
     * @var RewardsResource
     */
    public $rewards;

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

    /**
     * @var LoyaltyTransactionsResource
     */
    public $loyaltyTransactions;

    /**
     * @var PrepaidTransactionResource
     */
    public $prepaidTransactions;

    /**
     * @var RewardReceptionsResource
     */
    public $rewardReceptions;

    /**
     * @var AutomationsResource
     */
    public $automations;


    protected function setResources(BaseClient $client)
    {
        $this->contacts = new ContactsResource($client);
        $this->contactIdentifiers = new ContactIdentifiersResource($client);
        $this->giftcards = new GiftcardsResource($client);
        $this->giftcardTransactions = new GiftcardTransactionsResource($client);
        $this->shops = new ShopsResource($client);
        $this->rewards = new RewardsResource($client);
        $this->contactVerification = new ContactVerificationResource($client);
        $this->prepaidTransactions = new PrepaidTransactionResource($client);
        $this->rewardReceptions = new RewardReceptionsResource($client);
        $this->loyaltyTransactions = new LoyaltyTransactionsResource($client);
        $this->contactSubscriptions = new ContactSubscriptionsResource($client);
        $this->subscriptionTypes = new SubscriptionTypesResource($client);
        $this->creditReceptions = new CreditReceptionsResource($client);
        $this->automations = new AutomationsResource($client);
    }
}
