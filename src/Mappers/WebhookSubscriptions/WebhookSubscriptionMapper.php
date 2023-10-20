<?php

namespace Piggy\Api\Mappers\WebhookSubscriptions;

use Piggy\Api\Models\WebhookSubscriptions\WebhookSubscription;

/**
 * Class WebhookSubscriptionMapper
 * @package Piggy\Api\Mappers\WebhookSubscriptions
 */
class WebhookSubscriptionMapper
{
    /**
     * @param $data
     * @return WebhookSubscription
     */
    public function map($data): WebhookSubscription
    {
        return new WebhookSubscription(
            $data->uuid,
            $data->name,
            $data->event_type,
            $data->url ?? null,
            $data->properties ?? [],
            $data->status ?? null,
            $data->version ?? null,
            $data->created_at ?? null
        );
    }
}

