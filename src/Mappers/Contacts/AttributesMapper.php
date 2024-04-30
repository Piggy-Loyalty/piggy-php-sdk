<?php

namespace Piggy\Api\Mappers\Contacts;

class AttributesMapper
{
    public function map($data): array
    {
        $attributeMapper = new AttributeMapper;

        $attributes = [];
        foreach ($data as $item) {
            $attributes[] = $attributeMapper->map($item);
        }

        return $attributes;
    }
}
