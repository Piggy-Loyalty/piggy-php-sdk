<?php

namespace Piggy\Api\Http\Traits;

use Piggy\Api\Http\BaseClient;
use Piggy\Api\Models\Vouchers\Promotion;
use Piggy\Api\Models\WebhookSubscriptions\WebhookSubscription;
use Piggy\Api\Resources\OAuth\Automations\AutomationsResource;
use Piggy\Api\Resources\OAuth\Brandkit\BrandkitResource;
use Piggy\Api\Resources\OAuth\Contacts\ContactAttributesResource;
use Piggy\Api\Resources\OAuth\Contacts\ContactIdentifiersResource;
use Piggy\Api\Resources\OAuth\Contacts\ContactsResource;
use Piggy\Api\Resources\OAuth\Contacts\ContactVerificationResource;
use Piggy\Api\Resources\OAuth\ContactsPortal\ContactsPortalAuthUrlResource;
use Piggy\Api\Resources\OAuth\ContactSubscriptionsResource;
use Piggy\Api\Resources\OAuth\Forms\FormsResource;
use Piggy\Api\Resources\OAuth\Giftcards\GiftcardsResource;
use Piggy\Api\Resources\OAuth\Giftcards\GiftcardTransactionsResource;
use Piggy\Api\Resources\OAuth\Giftcards\Program\GiftcardProgramsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Program\LoyaltyProgramResource;
use Piggy\Api\Resources\OAuth\Loyalty\Receptions\CreditReceptionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Receptions\LoyaltyTransactionAttributesResource;
use Piggy\Api\Resources\OAuth\Loyalty\Receptions\LoyaltyTransactionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Receptions\RewardReceptionsResource;
use Piggy\Api\Resources\OAuth\Loyalty\RewardAttributes\RewardAttributesResource;
use Piggy\Api\Resources\OAuth\Loyalty\Rewards\RewardsResource;
use Piggy\Api\Resources\OAuth\Loyalty\Tokens\LoyaltyTokenResource;
use Piggy\Api\Resources\OAuth\PortalSessions\PortalSessionsResource;
use Piggy\Api\Resources\OAuth\PrepaidTransactionResource;
use Piggy\Api\Resources\OAuth\Shops\ShopsResource;
use Piggy\Api\Resources\OAuth\SubscriptionTypesResource;
use Piggy\Api\Resources\OAuth\Tiers\TiersResource;
use Piggy\Api\Resources\OAuth\Units\UnitsResource;
use Piggy\Api\Resources\OAuth\Vouchers\PromotionAttributesResource;
use Piggy\Api\Resources\OAuth\Vouchers\PromotionResource;
use Piggy\Api\Resources\OAuth\Vouchers\VoucherResource;
use Piggy\Api\Resources\OAuth\WebhookSubscriptions\WebhookSubscriptionsResource;
use Piggy\Api\Resources\OAuth\Zapier\ZapierWebhookResource;

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

    /**
     * @var UnitsResource
     */
    public $units;

    /** @var LoyaltyProgramResource */
    public $loyaltyProgram;


    /** @var GiftcardProgramsResource */
    public $giftcardProgram;

    /**
     * @var ContactAttributesResource */
    public $contactAttributes;

    /**
     * @var RewardAttributesResource */
    public $rewardAttributes;

    /**
     * @var LoyaltyTokenResource */
    public $loyaltyToken;

    /**
     * @var PromotionResource */
    public $promotion;

    /**
     * @var PromotionAttributesResource */
    public $promotionAttributes;

    /**
     * @var VoucherResource */
    public $voucher;

    /**
     * @var BrandkitResource */
    public $brandkit;

    /**
     * @var TiersResource */
    public $tier;

    /**
     * @var PortalSessionsResource
     */
    public $portalSessions;

    /**
     * @var FormsResource
     */
    public $forms;

    /**
     * @var LoyaltyTransactionAttributesResource
     */
    public $loyaltyTransactionAttributes;

    /**
     * @var WebhookSubscriptionsResource
     */
    public $webhookSubscriptions;

    /**
     * @var ZapierWebhookResource
     */
    public $zapierWebhook;

    /**
     * @var ContactsPortalAuthUrlResource
     */
    public $contactsPortalAuthUrl;

    /**
     * @param BaseClient $client
     *
     * @return void
     */
    protected function setResources(BaseClient $client)
    {
        $this->contacts = new ContactsResource($client);
        $this->contactIdentifiers = new ContactIdentifiersResource($client);

        $this->contactAttributes = new ContactAttributesResource($client);

        $this->giftcards = new GiftcardsResource($client);
        $this->giftcardTransactions = new GiftcardTransactionsResource($client);
        $this->giftcardProgram = new GiftcardProgramsResource($client);

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
        $this->units = new UnitsResource($client);
        $this->loyaltyProgram = new LoyaltyProgramResource($client);
        $this->rewardAttributes = new RewardAttributesResource($client);
        $this->loyaltyToken = new LoyaltyTokenResource($client);
        $this->promotion = new PromotionResource($client);
        $this->promotionAttributes = new PromotionAttributesResource($client);
        $this->voucher = new VoucherResource($client);
        $this->brandkit = new BrandkitResource($client);
        $this->tier = new TiersResource($client);
        $this->portalSessions = new PortalSessionsResource($client);
        $this->forms = new FormsResource($client);
        $this->loyaltyTransactionAttributes = new LoyaltyTransactionAttributesResource($client);
        $this->webhookSubscriptions = new WebhookSubscriptionsResource($client);
        $this->zapierWebhook = new ZapierWebhookResource($client);
        $this->contactsPortalAuthUrl = new ContactsPortalAuthUrlResource($client);
    }
}
