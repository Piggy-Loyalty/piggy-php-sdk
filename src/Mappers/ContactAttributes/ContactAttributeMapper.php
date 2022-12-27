<?php

namespace Piggy\Api\Mappers\ContactAttributes;

use Piggy\Api\Mappers\Contacts\OptionMapper;
use Piggy\Api\Models\ContactAttributes\ContactAttribute;
use stdClass;


class ContactAttributeMapper
{
    /**
     * @param stdClass $contactAttribute
     * @return ContactAttribute
     */
    public function map(stdClass $contactAttribute): ContactAttribute
    {
        $isSoftReadOnly = property_exists($contactAttribute, 'is_soft_read_only') && $contactAttribute->is_soft_read_only;
        $isHardReadOnly = property_exists($contactAttribute, 'is_hard_read_only') && $contactAttribute->is_hard_read_only;
        $isPiggyDefined = property_exists($contactAttribute, 'is_piggy_defined') && $contactAttribute->is_piggy_defined;


        $options = null;
        if (property_exists($contactAttribute, 'options') && $contactAttribute->options != null) {
            $optionsMapper = new OptionMapper();
            $options = $optionsMapper->map($contactAttribute->options);
        }

        return new ContactAttribute(
            $contactAttribute->name,
            $contactAttribute->label,
            $contactAttribute->data_type,
            $contactAttribute->description,
            $isSoftReadOnly,
            $isHardReadOnly,
            $isPiggyDefined,
            $options

        );
    }

}