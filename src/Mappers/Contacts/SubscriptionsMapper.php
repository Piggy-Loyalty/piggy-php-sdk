<?php

namespace Piggy\Api\Mappers\Contacts;

class SubscriptionsMapper
{
    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        $mapper = new SubscriptionMapper();

        $subscriptions = [];
        foreach ($data as $item) {
            $subscriptions[] = $mapper->map($item);
        }

        return $subscriptions;
    }
}
