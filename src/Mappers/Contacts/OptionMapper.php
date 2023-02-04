<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\Options;
use stdClass;

class OptionMapper
{
    /**
     * @param stdClass $options
     * @return Options
     */
    public function map(stdClass $options): Options
    {
        return new Options(
            $options->label,
            $options->value
        );
    }
}
