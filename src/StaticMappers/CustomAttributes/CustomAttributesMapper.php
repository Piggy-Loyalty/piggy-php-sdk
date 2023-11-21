<?php

namespace Piggy\Api\StaticMappers\CustomAttributes;

use Piggy\Api\StaticMappers\CustomAttributes\CustomAttributeMapper;

class CustomAttributesMapper
{
    /**
     * @param array $data
     * @return array
     */
    public static function map(array $data): array
    {
        $customAttributes = [];

        foreach ($data as $item) {
            $customAttributes[] = CustomAttributeMapper::map($item);
        }

        return $customAttributes;
    }
}