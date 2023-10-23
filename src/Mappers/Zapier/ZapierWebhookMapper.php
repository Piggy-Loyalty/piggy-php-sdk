<?php

namespace Piggy\Api\Mappers\Zapier;

use Piggy\Api\Models\Zapier\ZapierWebhook;

/**
 * Class WebhookSubscriptionMapper
 * @package Piggy\Api\Mappers\ZapierWebhook
 */
class ZapierWebhookMapper
{
    /**
     * @param $data
     * @return ZapierWebhook
     */
    public function map($data): ZapierWebhook
    {
        return new ZapierWebhook(
            $data->id,
            $data->type,
            $data->url
        );
    }
}

