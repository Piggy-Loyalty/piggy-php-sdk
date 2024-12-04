<?php

namespace Piggy\Api\Mappers\Perks;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Perk\PerkOption;
use stdClass;

class PerkOptionCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return PerkOption[]
     */
    public function map(array $data): array
    {
        $mapper = new PerkOptionMapper;

        $models = [];
        foreach ($data as $item) {
            $models[] = $mapper->map($item);
        }

        return $models;
    }
}
