<?php

namespace Piggy\Api\Mappers\Units;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Unit;
use stdClass;

class UnitCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return Unit[]
     */
    public function map(array $data): array
    {
        return $this->mapDataToModels(
            data: $data,
            mapper: UnitMapper::class
        );
    }
}
