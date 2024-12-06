<?php

namespace Piggy\Api\Mappers\Forms;

use Piggy\Api\Enums\FormStatus;
use Piggy\Api\Enums\FormType;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Form;
use stdClass;

class FormMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Form
    {
        return new Form(
            uuid: $data->uuid,
            name: $data->name,
            status: $data->status
                ? FormStatus::from($data->status)
                : null,
            type: FormType::from($data->type),
            url: $data->url,
        );
    }
}
