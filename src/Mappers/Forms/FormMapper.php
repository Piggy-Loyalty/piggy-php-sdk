<?php

namespace Piggy\Api\Mappers\Forms;

use Piggy\Api\Models\Forms\Form;

/**
 * Class FormMapper
 * @package Piggy\Api\Mappers\Forms
 */
class FormMapper
{
    /**
     * @param $data
     * @return Form
     */
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
