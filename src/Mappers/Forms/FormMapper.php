<?php

namespace Piggy\Api\Mappers\Forms;

use Piggy\Api\Enums\FormStatus;
use Piggy\Api\Enums\FormType;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Form;
use stdClass;

class FormMapper extends BaseModelMapper
{
    public function map(stdClass $data): Form
    {
        return new Form(
            $data->uuid,
            $data->name,
            $data->status ? FormStatus::from($data->status) : null,
            FormType::from($data->type),
            $data->url,
        );
    }
}
