<?php

namespace Piggy\Api\Mappers\Perks;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Perk\Perk;
use stdClass;

class PerkMapper extends BaseModelMapper
{
    public function map(stdClass $data): Perk
    {
        return new Perk(
            $data->uuid,
            $data->label,
            $data->name
        );
    }
}
