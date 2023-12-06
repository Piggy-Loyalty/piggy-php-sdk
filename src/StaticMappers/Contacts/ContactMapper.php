<?php

namespace Piggy\Api\StaticMappers\Contacts;

use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\StaticMappers\Loyalty\CreditBalanceMapper;
use Piggy\Api\StaticMappers\Prepaid\PrepaidBalanceMapper;
use stdClass;

class ContactMapper
{
    /**
     * @param stdClass $data
     * @return Contact
     */
    public static function map(stdClass $data): Contact
    {
        $prepaidBalance = null;
        if (property_exists($data, 'prepaid_balance') && $data->prepaid_balance !== null) {
            $prepaidBalance = PrepaidBalanceMapper::map($data->prepaid_balance);
        }

        $creditBalance = null;
        if (property_exists($data, 'credit_balance')) {
            $creditBalance = CreditBalanceMapper::map($data->credit_balance);
        }

        $attributes = null;
        if (property_exists($data, 'attributes')) {
            $attributes = ContactAttributesMapper::map($data->attributes);
        }

        $currentValues = [];
        if (property_exists($data, 'current_values')) {
            $currentValues = get_object_vars($data->current_values);
        }

        if (isset($data->subscriptions)) {
            $subscriptions = SubscriptionsMapper::map($data->subscriptions);
        } else {
            $subscriptions = null;
        }

        return new Contact(
            $data->uuid,
            $data->email ?? "",
            $prepaidBalance,
            $creditBalance,
            $attributes,
            $subscriptions,
            $currentValues
        );
    }
}