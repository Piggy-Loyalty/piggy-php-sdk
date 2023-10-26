<?php

namespace Piggy\Api\Mappers\ApiKeys;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Models\ApiKeys\ApiKey;
use stdClass;

/**
 * Class AutomationMapper
 * @package Piggy\Api\Mappers\Automations
 */
class ApiKeyMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return ApiKey
     */
    public function map(stdClass $data): ApiKey
    {
        return new ApiKey(
            $data->id,
            $data->api_key,
            $data->created_at
        );
    }
}
