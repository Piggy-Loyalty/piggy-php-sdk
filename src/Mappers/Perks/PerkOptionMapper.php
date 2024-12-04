<?php

namespace Piggy\Api\Mappers\Perks;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Perk\PerkOption;
use stdClass;

class PerkOptionMapper extends BaseModelMapper
{
    public function map(stdClass $data): PerkOption
    {
        return new PerkOption(
            $data->label,
            $data->value,
            $data->default,
            (new PerkMapper)->map($data->perk)
        );
    }
}
