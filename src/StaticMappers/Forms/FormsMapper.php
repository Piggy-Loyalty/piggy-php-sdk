<?php

namespace Piggy\Api\StaticMappers\Forms;

/**
 * Class FormsMapper
 * @package Piggy\Api\Mappers\Forms
 */
class FormsMapper
{
    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        $mapper = new FormMapper();

        $forms = [];
        foreach ($data as $item) {
            $forms[] = $mapper->map($item);
        }

        return $forms;
    }
}
