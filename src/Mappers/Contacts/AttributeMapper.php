<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Models\Contacts\Attribute;
use stdClass;


class AttributeMapper extends BaseMapper
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

//        var_dump('ingrid', $data->options);

        if (property_exists($data, 'options') && $data->options != null) {
            foreach ($data->options as $item) {
//                var_dump('item var dump', get_object_vars($item));
                $options[] = get_object_vars($item);
            }

//                $optionMapper = new OptionMapper();
//            var_dump('pietjepuk', $optionMapper->map($data->options));
//            $options[] = $optionMapper->map($data->options);

        }

//        var_dump('options', $options);


        return new Attribute(
            $data->name,
            $data->label,
            $data->type,
            $data->field_type ?? "",
            $data->description,
            $isSoftReadOnly,
            $isHardReadOnly,
            $isPiggyDefined,
            $options
        );
    }

}