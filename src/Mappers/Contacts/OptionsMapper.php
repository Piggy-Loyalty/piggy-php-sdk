<?php

namespace Piggy\Api\Mappers\Contacts;

class OptionsMapper
{
    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        $optionMapper = new OptionMapper();
        $options = [];
        foreach ($data as $item) {
            $options[] = $optionMapper->map($item);
        }

        return $options;
    }
}