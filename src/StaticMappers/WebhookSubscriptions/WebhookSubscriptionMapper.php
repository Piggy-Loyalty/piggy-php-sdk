<?php

namespace Piggy\Api\StaticMappers\WebhookSubscriptions;

use Piggy\Api\StaticMappers\BaseMapper;
use Piggy\Api\Models\WebhookSubscriptions\WebhookSubscription;

/**
 * Class WebhookSubscriptionMapper
 * @package Piggy\Api\Mappers\WebhookSubscriptions
 */
class WebhookSubscriptionMapper extends BaseMapper
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
            $data->url,
            $data->properties ?? [],
            $data->status,
            $data->version,
            $this->parseDate($data->created_at)
        );
    }
}

