<?php


require_once("vendor/autoload.php");

use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Automations\Automation;
use Piggy\Api\Models\Brandkit\Brandkit;

use Piggy\Api\Models\Contact;
//use Piggy\Api\Models\Contacts\Contact;

use Piggy\Api\Models\Contacts\ContactAttribute;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Models\Contacts\ContactVerification;
use Piggy\Api\Models\Contacts\Subscription;
use Piggy\Api\Models\Contacts\SubscriptionType;
use Piggy\Api\Models\ContactsPortal\ContactsPortal;
use Piggy\Api\Models\CustomAttributes\CustomAttribute;
use Piggy\Api\Models\Forms\Form;
use Piggy\Api\Models\Giftcards\Giftcard;
use Piggy\Api\Models\Giftcards\GiftcardProgram;
use Piggy\Api\Models\Giftcards\GiftcardTransaction;
use Piggy\Api\Models\Loyalty\LoyaltyProgram;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use Piggy\Api\Models\Loyalty\Receptions\RewardReception;
use Piggy\Api\Models\Loyalty\RewardAttributes\RewardAttribute;
use Piggy\Api\Models\Loyalty\Rewards\CollectableReward;
use Piggy\Api\Models\Loyalty\Rewards\Reward;
use Piggy\Api\Models\Loyalty\Token\LoyaltyToken;
use Piggy\Api\Models\Loyalty\Transactions\LoyaltyTransaction;
use Piggy\Api\Models\Loyalty\Transactions\LoyaltyTransactionAttribute;
use Piggy\Api\Models\Loyalty\Unit;
use Piggy\Api\Models\PortalSessions\PortalSession;
use Piggy\Api\Models\Prepaid\PrepaidTransaction;

//use Piggy\Api\Models\Referrals\Referral;
use Piggy\Api\Models\Shop;
//use Piggy\Api\Models\Shops\Shop;
use Piggy\Api\Models\Tiers\Tier;
use Piggy\Api\Models\Promotion;
use Piggy\Api\Models\Vouchers\PromotionAttribute;
//use Piggy\Api\Models\Vouchers\Voucher;
use Piggy\Api\Models\Voucher;
use Piggy\Api\Models;
use Piggy\Api\Models\Vouchers\VoucherReturnsStdClass;
use Piggy\Api\Models\WebhookSubscriptions\WebhookSubscription;
use Piggy\Api\OAuthClient;
use Piggy\Api\OAuthClientApiKey;
use Piggy\Api\Resources\OAuth\Contacts\ContactsResource;

/**
 * STATIC AUTH SETUP
 */
ApiClient::configure("gyxeH4GzVYhqWseTVJUGe9GWF23NjB8rXi5QomLq", "http://127.0.0.1:8001");

/**
 * STATIC AUTOMATION CALLS
 */
//$result = Automation::list();
//var_dump("list automations: ", $result);
//
//$result = Automation::create(["contact_uuid" => "123", "automation_uuid" => "fbc2b528-795c-43be-9695-397d2b51d5f5"]);
//var_dump("create automation for contact: " , $result);

/**
 * STATIC BRANDKIT CALLS
 */

//$result = Brandkit::get();
//var_dump("get brandkit: ", $result);
//
//$result = Brandkit::newGet();
//var_dump("show brandkit: ", $result);

/**
 * STATIC CREDIT RECEPTION CALLS
 */
//$result = CreditReception::create(["contact_uuid" => "123", "shop_uuid" => "123123", "credits" => 10]);
//var_dump("create credit reception: ", $result);

//$result = CreditReception::calculate(["shop_uuid" => "123123", "unit_value" => 10, "contact_uuid" => "123"]);
//var_dump("calculate credits", $result);


/**
 * STATIC COLLECTABLE REWARDS CALLS
 */
//$result = CollectableReward::list(['contact_uuid' => "123"]);
//var_dump("list collectable rewards for contact with uuid: ", $result);

//$result = CollectableReward::collect( "13ac4cc1-3522-4dfc-ae4a-a821e5090108");
//var_dump("collected reward: ", $result);

/**
 * STATIC CONTACT CALLS
 */

//$result = Contact::get('123');
//var_dump("get contact: " . $result->getEmail());

//$result = Contact::create(["email" => "henkdevries3@hotmail.com"]);
//var_dump('create contact for email with uuid: ', $result);

//$result = Contact::findOrCreate(["email" => "nizlslzvzrt_42@hytmxil.cym"]);
//var_dump("findOrCreate contact: " , $result);

//$result = Contact::find(["email" => "janvandenboer@live.nl"]);
//var_dump("findOneBy contact: " .  $result->getUuid());

//$results = Contact::list(["page" => 1, "limit" => 3]);
//var_dump("list contacts: " ,  $results);

//$result = Contact::findOrCreateAsync(["email" => "margrietdekonin2g@msn.nl"]);
//var_dump("finds or creates a contact asynchronously ", $result);

//$result = Contact::createAnonymously(["contact_identifier_value" => "mijn-identifier44"]);
//var_dump("createAnonymously contact", $result);

//$result = Contact::update("fe17ab65-e98e-4f00-a0d8-474b3ff8c286", ["attributes" => ["firstname" => "thibaux" , "lastname" => "swildens"]]);
//var_dump("update contact", $result->getAttributes());

//$result = Contact::createAsync(["email" => "new_contac9@piggy.eu"]);
//var_dump("create contact asynchronously ", $result);

//$result = Contact::delete("c3da9cad-8df0-41b1-bfe0-ec6fe5f5862d", ["type" => "GDPR"]);
//var_dump("deletes a contact (and returns null)", $result);
//
//$result = Contact::claimAnonymousContact("999",["email" => "henkvandenvelden@hotmail.com"]);
//var_dump("claims a contact anonymously", $result);

//$result = Contact::getCreditBalance('123');
//var_dump("get credit balance for contact", $result);
//
//$result = Contact::getPrepaidBalance("123");
//var_dump("get prepaid balance for contact", $result);
//
//$result = Contact::getTier("123");
//var_dump("get tier for contact", $result);

/**
 * STATIC CONTACT ATTRIBUTES CALLS
 */
//$result = ContactAttribute::list();
//var_dump("list contact attributes", $result);

//$result = ContactAttribute::create(["name" => "favorite_color728912", "label" => "Your Favorite Color", "data_type" => "select", "description" => "some description", "options" => [["label" => "Blue", "value" => "100"], ["label" => "Red", "value" => "200"], ["label" => "Yellow", "value" => "300"]]]);
//var_dump("create contact attributes", $result);

/*
 * STATIC CONTACT IDENTIFIER CALLS
 */
//$result = ContactIdentifier::get(["contact_identifier_value" => "mijn-identifier2"]);
//var_dump("get contact identifier: ", $result);
//
//$result = ContactIdentifier::create(["contact_identifier_value" => "somerandomvalue123222111211777"]);
//var_dump("create contact identifier", $result);
//
//$result = ContactIdentifier::link(["contact_identifier_value" => "123123", "contact_uuid" => "123"]);
//var_dump("link contact identifier", $result);

/**
 * STATIC CONTACT PORTAL CALLS
 */
//$result = ContactsPortal::getAuthUrl(["contact_uuid" => 123]);
//var_dump("show auth url", $result);

/**
 * STATIC CUSTOM ATTRIBUTE CALLS
 */
//$result = CustomAttribute::list(["entity" => "voucher"]);
//var_dump("list custom attributes", $result);

//$result = CustomAttribute::create(["entity" => "henk", "name" => "someName", "label" => "someLabel", "type" => "voucher", "options" => [], "description" => "someDescription"]);

/**
 * CONTACT SUBSCRIPTIONS CALLS
 */

//$result = Subscription::list();
//var_dump("list subscriptions", $result);

//$result = Subscription::list("123");
//var_dump("list contact subscriptions", $result);

//$result = Subscription::subscribe("123", ["subscription_type_uuid" => "123123123"]);
//var_dump("subscribe contract", $result);

//$result = Subscription::unsubscribe("123", ["subscription_type_uuid" => "123123123"]);
//var_dump("unsubscribe contact", $result);


/**
 *  STATIC CONTACT VERIFICATION CALLS
 */

//$result = ContactVerification::sendVerificationMail(["email" => "nizlslzvzrt_42@hytmxil.cym"]);
//var_dump("send verification mail", $result);

//$result = ContactVerification::getAuthToken("123");
//var_dump("show contact auth token", $result);

//$result = ContactVerification::verifyLoginCode(["email" => "kylk_88@zzyrg.nl", "code" => "171673"]);
//var_dump("verify login code", $result);

/**
 * STATIC FORM CALLS
 */
//$result = Form::list(["status" => "PUBLISHED", "type" => "PUBLIC"]);
//var_dump("list forms", $result);

/**
 * STATIC GIFTCARD PROGRAM CALLS
 */
//$result = GiftcardProgram::list();
//var_dump("list giftcard programs", $result);

/**
 * STATIC GIFTCARD CALLS
 */
//$result = Giftcard::find(["hash" => "41656"]);
//var_dump("findOneBy giftcard", $result);

//$result = Giftcard::create(["giftcard_program_uuid" => "8fb59dcf-fb5b-4cee-88d8-35e361e55a12", "type" => 1]);
//var_dump("create giftcard", $result);

/**
 * STATIC GIFTCARD TRANSACTION CALLS
 */
//$result = GiftcardTransaction::get("61d663f5-31dd-4937-867d-f2bf19a1b279", []);
//var_dump("show giftcard transaction", $result);

//$result = GiftcardTransaction::list(["giftcard_program_uuid" => "8fb59dcf-fb5b-4cee-88d8-35e361e55a12"]);
//var_dump("list giftcard transactions", $result);

//$result = GiftcardTransaction::create(["shop_uuid" => "123123", "giftcard_uuid" => "bdfeabeb-a284-4e82-b39b-f70fd6b1c97e", "amount_in_cents" => 110]);
//var_dump("create giftcard transaction", $result);

//$result = GiftcardTransaction::correct("679915dd-711e-45f6-9aae-c6d691467417");
//var_dump("correct giftcard transaction", $result);

/**
 * STATIC LOYALTY PROGRAM CALLS
 */
//$result = LoyaltyProgram::get();
//var_dump("create loyalty token", $result);


/**
 * STATIC LOYALTY TOKEN CALLS
 */
//$result = LoyaltyToken::create(["version" => "v3", "shop_uuid" => "123", "unique_id" => "jlwifcjwji3nfi2389j", "credits" => 10]);
//var_dump("create loyalty token", $result);

//$result = LoyaltyToken::create(["version" => "v3", "shop_id" => "15", "unique_id" => "henkie99", "credits" => 10]);
//var_dump("create loyalty token with units", $result);

//$result = LoyaltyToken::claim(["version" => "v1", "shop_id" => "15", "unique_id" => "henkie99   ", "credits" => 10, "timestamp" => 1699557856, "hash" => "1cee371605a61f9423aad7d740b51a185f689575", "contact_uuid" => "123"]);
//var_dump("claim loyalty token", $result);


/**
 * STATIC LOYALTY TRANSACTION CALLS
 */
//$result = LoyaltyTransaction::list(["page" => 1, "limit" => 3, "contact_uuid" => " 9e59f163-6959-4fb0-943b-6235cb493bbf"]);
//var_dump("list loyalty transactions", $result);

/**
 * STATIC LOYALTY TRANSACTION ATTRIBUTES CALLS
 */
//$result = LoyaltyTransactionAttribute::create(["name" => "favorite_color7ddd12232323123777721", "label" => "Favorite Color99", "data_type" => "text", "options" => [["blue" => "Blue"], ["red" => "Red"]]]);
//var_dump("create loyalty transaction attribute", $result);

//$result = LoyaltyTransactionAttribute::list();
//var_dump("list loyalty transaction attributes", $result);

/**
 * STATIC PROMOTION CALLS
 */
//$result = Promotion::create(["name" => "Some Promotion Name2", "description" => "Some Promotion Description2", "voucher_limit" => 30, "limit_per_contact" => 10]);
//var_dump("create promotion", $result);
//var_dump('title:', $result->getName());

//$result = Promotion::list();
//var_dump("list promotions", $result);

/**
 * STATIC PROMOTION ATTRIBUTE CALLS
 */

//$result = PromotionAttribute::list();
//var_dump("list promotion attributes", $result);
//
//$result = PromotionAttribute::create(["name" => "shipping", "label" => "Shipping", "type" => "select", "options" => [["label" => "Domestic", "value" => "domestic"], ["label" => "International", "value" => "international"], ["label" => "Intergalactic", "value" => "intergalactic"]]]);
//var_dump("create promotion attribute: ", $result);
//
//$result = PromotionAttribute::get(7);
//var_dump("get promotion attribute", $result);

//$result = PromotionAttribute::update(2239, [["name" => "shipping_region"], ["label" => "Shipping Region"]]);
//var_dump("update promotion attribute: ", $result);

/**
 * STATIC PREPAID TRANSACTION CALLS
 */
//$result = PrepaidTransaction::create(["contact_uuid" => "123", "amount_in_cents" => 1000, "shop_uuid" => "123123"]);
//var_dump("create prepaid transaction", $result);

/**
 * STATIC PORTAL SESSIONS CALLS
 */
//$result = PortalSession::create(["shop_uuid" => "2222e1242t3324535"]);
//var_dump("create portal session", $result);

//$result = PortalSession::get("d02c7730-a1bb-471d-b293-bdc5add171e5", []);
//var_dump("show portal session", $result);


/**
 * STATIC REFERRAL CALLS
 */
//$result = Referral::list();
//var_dump("list referrals", $result);


/**
 * STATIC REWARD CALLS
 */
//$result = Reward::list();
//$result = Reward::list(['shop_uuid' => "123123", "contact_uuid" => "123"]);
//var_dump("list rewards", $result);

//$rewardUpdate = Reward::update('539483d0-fab4-40db-add5-2ec65ef12901',  ["title" => "Lekkerbekkie1"]);
//var_dump("update reward1", $rewardUpdate);

//$newRewardUpdate = Reward::newUpdate("539483d0-fab4-40db-add5-2ec65ef12901", ["title" => "Lekkerbekkie2"]);
//var_dump("update reward2", $newRewardUpdate);

/**
 * STATIC REWARD ATTRIBUTION CALLS
 */
//$result = RewardAttribute::list();
//var_dump("list reward attributes", $result);
//
//$result = RewardAttribute::create(["name" => "someName122323we8e2dfjdde112eiedodfk2388383222", "label" => "Some Nameeeeee 123e223211312dddd2fddf222293e9939331", "type" => "select", "options" => [["label" => "henk", "value" => 100], ["label" => "kees", "value" => 200]]]);
//var_dump("create reward attribte", $result);

/**
 * STATIC REWARD RECEPTION CALLS
 */
//$result = RewardReception::create(["contact_uuid" => "123", "reward_uuid" => "539483d0-fab4-40db-add5-2ec65ef12901", "shop_uuid" => "123123"]);
//var_dump("create reward reception", $result);

/**
 * STATIC SUBSCRIPTION TYPE CALLS
 */
//$result = SubscriptionType::list();
//var_dump("list subscription types", $result);

/**
 * STATIC SHOP CALLS
 */
//$result = Shop::list();
//var_dump("list shops", $result);

//$result = Shop::get("123123");
//var_dump("get shop", $result);

//$uuid = $result->getUuid();
//var_dump($uuid);







//$shop = $result->shop();
//var_dump($shop);
//die;

//$uuid = $shop->getUuid();
//var_dump($uuid);


/**
 * STATIC TIER CALLS
 */
//$result = Tier::list();
//var_dump('list tiers', $result);

/**
 * STATIC UNIT CALLS
 */
//$result = Unit::list();
//var_dump('list units', $result);

//$result = Unit::create(["name" => "test4", "label" => "Some Unit"]);
//var_dump('create unit', $result);

/**
 * STATIC VOUCHER CALLS
 */

//$result = Voucher::create(["promotion_uuid" => "123", "code" => "EXAMPLE-CODE-1211212", "expiration_date" => "2023-12-12T10:00:00+00:00", "activation_date" => "2023-12-10T10:00:00+00:00"]);
//var_dump("create voucher", $result);

//$code = $result->getCode();

//var_dump($code);

//$result = Voucher::list(["promotion_uuid" => "123", "limit" => "30", "page" => "1"]);
//var_dump("list vouchers", $result);

//$result = Contact::newGet('123');
//var_dump($result);
//var_dump("get contact: " . $result->getEmail());

$result = Voucher::find(["code" => "VGUZFKYXS"]);
var_dump($result);
//var_dump($result->getCode());

//var_dump("find voucher by code", $result);

//$voucher = $result->voucher();

//var_dump($voucher);
//die;



//$result = Voucher::redeem(["code" => "VMOCXNUFK", "contact_uuid" => "123"]);
//var_dump("redeem voucher for a contact", $result);

//$result = Voucher::lock("f6903d6a-59b9-42a9-aabb-c7772e5c1d3d");
//var_dump("voucher locked:", $result);

//$result = Voucher::batch(["promotion_uuid" => "123", "quantity" => 10]);
//var_dump($result);

//HTTP_METH_POST
//$result = Voucher::redeem(["code" => "VOY5GSOO1", "contact_uuid" => null, "release_key" => "01eca965-aba4-4537-bc88-67a84624ffb8"]);
//var_dump("redeem voucher that is locked by supplying release key", $result);

//$result = Voucher::release("5cc7e94a-7aa2-4f4a-8a8c-c20ab3a086ce", ["release_key" => "be2ff462-6b76-4d3f-883a-b8d2dfad77eb"]);
//var_dump("voucher released:", $result);

//$result = Voucher::update("efcf5588-0329-4e87-927b-df10100e13a5", ["expiration_date" => "2024-12-12T10:00:00+00:00"]);
//var_dump("voucher updated:", $result);

/**
 * STATIC VOUCHER CALLS WITHOUT MAPPERS AND STD CLASS IN RETURN
 */

//$result = VoucherReturnsStdClass::create(["promotion_uuid" => "123", "code" => "EXAMPLE-CODE-971172712", "hans" => "hansie", "expiration_date" => "2023-12-12T10:00:00+00:00", "activation_date" => "2023-11-29T10:00:00+00:00"]);
//var_dump("create voucher", $result);
//
//$code = $result->code;
//var_dump($code);
//
//$voucherLimit = $result->promotion->voucher_limit;
//var_dump($voucherLimit);

//$result = VoucherReturnsStdClass::batch(["promotion_uuid" => "123", "quantity" => 10]);
//var_dump($result);

//$result = VoucherReturnsStdClass::list(["promotion_uuid" => "123", "limit" => "30", "page" => "1"]);
//var_dump("list vouchers", $result);

//$result = VoucherReturnsStdClass::find(["code" => "EXAMPLE-CODE-084675676793"]);
//var_dump("find voucher by code", $result);

//$result = VoucherReturnsStdClass::update("01fc1154-d367-4f23-a95e-8b854e30b374", ["status" => "ACTIVE"]);
//var_dump("voucher updated:", $result);

//$result = VoucherReturnsStdClass::lock("01fc1154-d367-4f23-a95e-8b854e30b374");
//var_dump("voucher locked:", $result);

//$result = VoucherReturnsStdClass::release("01fc1154-d367-4f23-a95e-8b854e30b374", ["release_key" => "670a3e0c-dfac-4756-962d-5b6752a49fe4"]);
//var_dump("voucher released:", $result);

//$result = VoucherReturnsStdClass::redeem(["code" => "VOY5GSOO1", "contact_uuid" => null, "release_key" => "01eca965-aba4-4537-bc88-67a84624ffb8"]);
//var_dump("redeem voucher that is locked by supplying release key", $result);

//$result = VoucherReturnsStdClass::redeem(["code" => "EXAMPLE-CODE-9871", "contact_uuid" => "123"]);
//var_dump("redeem voucher for a contact", $result);


/**
 *  STATIC WEBHOOK SUBSCRIPTION CALLS
 */

//$result = WebhookSubscription::create(["name" => "someWebhookSubscription", "url" => "http://192.168.100.151:3000/piggy/floepsie33", "event_type" => "credit_reception_created"]);
//var_dump("create webhook subscription", $result);

//$result = WebhookSubscription::list();
//var_dump("list webhook subscriptions", $result);

//$result = WebhookSubscription::update("a56862a3-70fe-45c6-addb-102d75ee46ce", ["name" => "someUpdatedName"]);
//var_dump("update webhook subscription", $result);

//$result = WebhookSubscription::get("a56862a3-70fe-45c6-addb-102d75ee46ce");
//var_dump("get webhook subscription", $result);

//$result = WebhookSubscription::delete("9bff0a75-0198-4881-9db9-95b31575bdce");
//var_dump($result);

//$result = Unit::create(['name' => 'dekkeUnit', "label" => "Dekke Unit"]);
//var_dump('create unit', $result);

//$result = \Piggy\Api\Models\Giftcards\Giftcard::create([
//    "type" => 1,
//    "giftcard_program_uuid" => 123123123123123,
//    "shop_uuid" => 231231231231231
//]);
//
//var_dump($result);
//die();
