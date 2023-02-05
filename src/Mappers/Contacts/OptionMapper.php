<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\Option;
use stdClass;

class OptionMapper
{
    /**
     * @param stdClass $options
     * @return Option
     */
    public function map(stdClass $options): Option
    {
        return new Option(
            $options->label,
            $options->value
        );
    }
}
