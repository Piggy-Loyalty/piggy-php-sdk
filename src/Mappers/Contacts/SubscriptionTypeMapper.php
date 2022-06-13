<?php

namespace Piggy\Api\Mappers\Contacts;


use Piggy\Api\Models\Contacts\SubscriptionType;

class SubscriptionTypeMapper
{
    /**
     * @param object $data
     *
     * @return SubscriptionType
     */
    public function map(object $data): SubscriptionType
    {
        return new SubscriptionType(
            $data->id,
            $data->name,
            $data->description,
            $data->active,
            $data->strategy
        );
    }
}
