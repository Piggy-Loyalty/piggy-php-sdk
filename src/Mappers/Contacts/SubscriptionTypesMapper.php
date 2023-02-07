<?php

namespace Piggy\Api\Mappers\Contacts;

class SubscriptionTypesMapper
{
    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        $mapper = new SubscriptionTypeMapper();
        $subscriptionTypes = [];

        foreach ($data as $item) {
            $subscriptionTypes[] = $mapper->map($item);
        }

        return $subscriptionTypes;
    }
}
