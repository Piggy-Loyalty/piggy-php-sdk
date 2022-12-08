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
        var_dump('contactattribute', $contactAttribute);
        $options = null;
        if (property_exists($contactAttribute, 'options') && $contactAttribute->options != null) {
            var_dump('options', $options);
            $optionsMapper = new OptionMapper();
            $options = $optionsMapper->map($contactAttribute->options);
        }

        return new ContactAttribute(
            $contactAttribute->name,
            $contactAttribute->label,
            $contactAttribute->description,
            $contactAttribute->type,
            $contactAttribute->is_soft_read_only,
            $contactAttribute->is_hard_read_only,
            $contactAttribute->is_piggy_defined,
            $options
        );
    }
}