<?php

namespace Piggy\Api\Mappers\Loyalty;

use Piggy\Api\Models\Loyalty\LoyaltyProgram;
use Piggy\Api\Models\Loyalty\Media;

/**
 * Class LoyaltyProgramMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class MediaMapper
{
    /**
     * @param object $data
     * @return Media
     */
    public function map(object $data): Media
    {
        $media = new Media(
            $data->type,
            $data->value
        );

        return $media;
    }
}