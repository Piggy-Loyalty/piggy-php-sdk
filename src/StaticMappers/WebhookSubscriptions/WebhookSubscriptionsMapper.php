<?php

namespace Piggy\Api\StaticMappers\WebhookSubscriptions;

/**
 * Class WebhookSubscriptionsMapper
 * @package Piggy\Api\Mappers\WebhookSubscriptions
 */
class WebhookSubscriptionsMapper
{
    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        $mapper = new WebhookSubscriptionMapper();

        $WebhookSubscriptions = [];
        foreach ($data as $item) {
            $WebhookSubscriptions[] = $mapper->map($item);
        }

        return $WebhookSubscriptions;
    }
}
