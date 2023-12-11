<?php

namespace Piggy\Api;

use Piggy\Api\Http\Responses\Response;
use Piggy\Api\Models\Promotion;
use stdClass;

class Model
{
    protected static $allowedNestedModels = [
        "promotion",
//        "contact",
    ];

    protected $values;

//    protected $data = [];

    protected $uuid;

    public function getValues()
    {
        return $this->values;
    }

    public function getMeta(): stdClass
    {
        return $this->meta;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

//    public function voucher()
//    {
//            $voucher = $this->createTypedClassFromStdClass('subscription', Models\Subscription::class,
//            array(
//                'subscription_items' => Models\SubscriptionSubscriptionItem::class,
//                'item_tiers' => Models\SubscriptionItemTier::class,
//                'charged_items' => Models\SubscriptionChargedItem::class,
//                'addons' => Models\SubscriptionAddon::class,
//                'event_based_addons' => Models\SubscriptionEventBasedAddon::class,
//                'charged_event_based_addons' => Models\SubscriptionChargedEventBasedAddon::class,
//                'coupons' => Models\SubscriptionCoupon::class,
//                'shipping_address' => Models\SubscriptionShippingAddress::class,
//                'referral_info' => Models\SubscriptionReferralInfo::class,
//                'contract_term' => Models\SubscriptionContractTerm::class,
//                'discounts' => Models\SubscriptionDiscount::class
//            ));
//        return $subscription;
//    }

//$voucher = Model::createTypedClassFromStdClass($response->getData(), self::class, Promotion::class);
//

    // for future use, casting a calssname to 'promotion' for keys ...
    public static function getClassNameInLowerCase($class): string
    {
        $className = new \ReflectionClass($class);

        return strtolower($className->getShortName());
    }

    public static function createTypedClassFromStdClass($stdClass, $class = null, $nestedClass = null): Model
    {
        $instance = new $class();

        foreach ($stdClass as $property => $value) {
            if (in_array($property, self::$allowedNestedModels)) {
                $nestedInstance = self::createTypedClassFromStdClass($value, $nestedClass);
                $instance->$property = $nestedInstance;
            }
            else {
                $instance->$property = $value;
            }
        }

        return $instance;
    }

//    private function _get($type, $class, $subTypes = array(), $dependantTypes = array())
//    {
//        if(!array_key_exists($type, $this->_response))
//        {
//            return null;
//        }
//        if(!array_key_exists($type, $this->_responseObj))
//        {
//            $this->_responseObj[$type] = new $class($this->_response[$type], $subTypes, $dependantTypes);
//        }
//        return $this->_responseObj[$type];
//    }
}