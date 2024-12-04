<?php

namespace Piggy\Api\Mappers\Perks;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Mappers\Perks\PerkOptionMapper;
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

        $perkOptions = [];
        foreach ($data as $item) {
            $perkOptions[] = $mapper->map($item);
        }

        return $perkOptions;
    }
}
