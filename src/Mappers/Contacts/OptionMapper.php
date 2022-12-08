<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\ContactAttributes\Options;
use stdClass;

class OptionMapper
{
    /**
     * @param stdClass $data
     * @return Options
     */
    public function map(stdClass $data): Options
    {
        return new Options(
            $data->label,
            $data->value
        );
    }
}
