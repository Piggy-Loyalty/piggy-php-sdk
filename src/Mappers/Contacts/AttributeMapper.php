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
        $isSoftReadOnly = property_exists($data, 'is_soft_read_only') && $data->is_soft_read_only;
        $isHardReadOnly = property_exists($data, 'is_hard_read_only') && $data->is_hard_read_only;
        $isPiggyDefined = property_exists($data, 'is_piggy_defined') && $data->is_piggy_defined;
        $options = [];

        if (property_exists($data, 'options') && $data->options != null) {
            $optionsMapper = new OptionMapper();
            $options = $optionsMapper->map($data->options);
        }

        return new Attribute(
            $data->name,
            $data->label,
            $data->type,
            $data->field_type,
            $data->description,
            $isSoftReadOnly,
            $isHardReadOnly,
            $isPiggyDefined,
            $options
        );
    }

}