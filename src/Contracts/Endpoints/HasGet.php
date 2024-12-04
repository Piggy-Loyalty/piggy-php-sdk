<?php

namespace Piggy\Api\Contracts\Endpoints;

use Piggy\Api\Models\BaseModel;

interface HasGet
{
    /**
     * Get a single resource.
     *
     * @param mixed[] $params
     */
    public function get(array $params = []): BaseModel;
}
