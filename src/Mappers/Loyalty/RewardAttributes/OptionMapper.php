<?php

namespace Piggy\Api\Mappers\Loyalty\RewardAttributes;

use Piggy\Api\Models\Loyalty\RewardAttributes\Options;
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
