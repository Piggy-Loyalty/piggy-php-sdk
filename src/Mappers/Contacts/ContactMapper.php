<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Mappers\Loyalty\CreditBalanceMapper;
use Piggy\Api\Models\Contacts\Contact;

class ContactMapper
{
    /**
     * @param object $data
     *
     * @return Contact
     */
    public function map(object $data): Contact
    {
        if ($data->prepaid_balance == null) {
            $prepaidBalance = null;
        } else {
            $prepaidBalanceMapper = new PrepaidBalanceMapper();
            $prepaidBalance = $prepaidBalanceMapper->map($data->prepaid_balance);
        }

        if ($data->credit_balance == null) {
            $creditBalance = null;
        } else {
            $creditBalanceMapper = new CreditBalanceMapper();
            $creditBalance = $creditBalanceMapper->map($data->credit_balance);
        }

        if ($data->attributes == null) {
            $attributes = null;
        } else {
            $attributesMapper = new ContactAttributesMapper();
            $attributes = $attributesMapper->map($data->attributes);
        }

        if ($data->current_values == null) {
            $currentValues = null;
        } else {
            $currentValuesMapper = new CurrentValuesMapper();
            $currentValues = $currentValuesMapper->map($data->current_values);
        }

        if ($data->subscriptions == null) {
            $subscriptions = null;
        } else {
            $subscriptionsMapper = new SubscriptionsMapper();
            $subscriptions = $subscriptionsMapper->map($data->subscriptions);
        }


        $contact = new Contact(
            $data->uuid,
            $data->email ?? "",
            $prepaidBalance ?? "",
            $creditBalance ?? "",
            $attributes ?? [],
            $subscriptions ?? [],
            $currentValues ?? []
        );

        return $contact;
    }
}
