<?php

namespace Piggy\Api\Mappers\Forms;

use Piggy\Api\Models\Forms\Form;

/**
 * Class FormMapper
 */
class FormMapper
{
    public function map($data): Form
    {
        return new Form(
            $data->name,
            $data->status,
            $data->url,
            $data->uuid,
            $data->type
        );
    }
}
