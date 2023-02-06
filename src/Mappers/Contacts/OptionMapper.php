<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\Option;
use stdClass;

class OptionMapper
{
    /**
     * @param array $options
     * @return Option
     */
    public function map(array $options): Option
    {
        $label = null;
        $value = null;
        foreach ($options as $item) {
            $label = $item->label;
//            var_dump($label);
            $value = $item->value;
//            var_dump($value);
        }

        return new Option(
            $label,
            $value
        );
    }
}
