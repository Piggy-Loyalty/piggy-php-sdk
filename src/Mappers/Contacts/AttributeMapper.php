<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\Attribute;
use stdClass;

class AttributeMapper
{
    /**
     * @param stdClass $data
     * @return Attribute
     */
    public function map(stdClass $data): Attribute
    {

        $options = [];
        if (property_exists($data, 'options')) {
            var_dump('options?', $options);
            die;
            $options = get_object_vars($data->current_values);
        }

        var_dump('$data', $data);
        return new Attribute(
            $data->name,
            $data->label,
            $data->description,
            $data->type,
            $data->field_type,
            $data->is_soft_read_only,
            $data->is_hard_read_only,
            $data->is_piggy_defined,
//            $data-> new Options()
        );
    }
}
