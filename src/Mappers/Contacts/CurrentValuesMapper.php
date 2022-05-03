<?php

namespace Piggy\Api\Mappers\Contacts;

class CurrentValuesMapper
{
    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        $mapper = new ContactAttributeValueMapper();

        $currentValues = [];
        foreach ($data as $name => $value) {
            $currentValues[] = $mapper->map((object) ['name' => $name, 'value' => $value]);
        }

        return $currentValues;
    }
}
