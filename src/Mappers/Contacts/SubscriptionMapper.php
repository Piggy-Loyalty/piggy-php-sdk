<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\Subscription;

class SubscriptionMapper
{
    /**
     * @param object $data
     *
     * @return Subscription
     */
    public function map(object $data): Subscription
    {
        $subscriptionTypeMapper = new SubscriptionTypeMapper();
        $subscriptionType = $subscriptionTypeMapper->map($data->subscription_type);

        return new Subscription(
            $subscriptionType,
            $data->is_subscribed,
            $data->status
        );
    }
}
