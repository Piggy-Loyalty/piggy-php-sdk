<?php

namespace Piggy\Api\Mappers\WebhookSubscriptions;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Models\WebhookSubscriptions\WebhookSubscription;

/**
 * Class WebhookSubscriptionMapper
 */
class WebhookSubscriptionMapper extends BaseMapper
{
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
