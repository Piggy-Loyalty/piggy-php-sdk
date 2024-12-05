<?php

namespace Piggy\Api\Contracts\Endpoints;

use Piggy\Api\Models\BaseModel;

interface HasList
{
    /**
     * List all resources.
     *
     * @param  mixed[]  $params
     * @return BaseModel[]
     */
    public function list(array $params = []): array;
}
