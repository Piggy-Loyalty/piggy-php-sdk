<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Mappers\Loyalty\CreditBalanceMapper;
use Piggy\Api\Mappers\Prepaid\PrepaidBalanceMapper;
use Piggy\Api\Models\Contacts\Contact;
use stdClass;

class ContactMapper
{
    /**
     * @param stdClass $data
     * @return Contact
     */
    public function map(stdClass $data): Contact
    {
        $prepaidBalance = null;
        if (property_exists($data,'prepaid_balance')) {
            $prepaidBalanceMapper = new PrepaidBalanceMapper();
            $prepaidBalance = $prepaidBalanceMapper->map($data->prepaid_balance);
        }

        $creditBalance = null;
        if (property_exists($data,'credit_balance')) {
            $creditBalanceMapper = new CreditBalanceMapper();

            $creditBalance = $creditBalanceMapper->map($data->credit_balance);
        }

        $attributes = null;
        if (property_exists($data,'attributes')) {
            $attributesMapper = new ContactAttributesMapper();
            $attributes = $attributesMapper->map($data->attributes);
        }

        $currentValues = [];
        if (property_exists($data,'current_values')) {
            $currentValues = get_object_vars($data->current_values);
        }

        $subscriptions = null;
        if (property_exists($data,'subscriptions')) {
            $subscriptionsMapper = new SubscriptionsMapper();
            $subscriptions = $subscriptionsMapper->map($data->subscriptions);
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
