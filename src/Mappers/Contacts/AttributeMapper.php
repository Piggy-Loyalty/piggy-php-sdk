<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\Attribute;

class AttributeMapper
{
    /**
     * @param object $data
     *
     * @return Attribute
     */
    public function map(object $data): Attribute
    {
        return new Attribute(
            $data->name,
            $data->label,
            $data->description,
            $data->type,
            $data->field_type,
            $data->is_soft_read_only,
            $data->is_hard_read_only,
            $data->is_piggy_defined,
            $data->options
        );
    }
}
