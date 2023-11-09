<?php

namespace Piggy\Api\StaticMappers\Forms;

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
    public static function map($data): Form
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
