<?php

namespace Piggy\Api\Mappers\Forms;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Form;
use stdClass;

class FormMapper extends BaseModelMapper
{
    public function map(stdClass $data): Form
    {
        return new Form(
            $data->uuid ?? null,
            $data->name,
            $data->status ?? null,
            $data->type,
            $data->url,
        );
    }
}
