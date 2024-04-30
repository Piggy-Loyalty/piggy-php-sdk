<?php

namespace Piggy\Api\Mappers\WebhookSubscriptions;

/**
 * Class WebhookSubscriptionsMapper
 */
class WebhookSubscriptionsMapper
{
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
