<?php

namespace Piggy\Api\StaticMappers\Contacts;

class SubscriptionTypesMapper
{
    /**
     * @param $data
     * @return array
     */
    public static function map($data): array
    {
        $subscriptionTypes = [];

        foreach ($data as $item) {
            $subscriptionTypes[] = SubscriptionTypeMapper::map($item);
        }

        return $subscriptionTypes;
    }
}
