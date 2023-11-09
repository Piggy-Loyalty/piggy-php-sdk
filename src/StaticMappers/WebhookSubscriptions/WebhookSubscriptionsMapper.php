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
    public static function map($data): array
    {
        $webhookSubscriptions = [];

        foreach ($data as $item) {
            $webhookSubscriptions[] = WebhookSubscriptionMapper::map($item);
        }

        return $webhookSubscriptions;
    }
}
