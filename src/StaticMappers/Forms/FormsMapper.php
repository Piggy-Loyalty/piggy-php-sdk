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
    public static function map($data): array
    {
        $forms = [];
        foreach ($data as $item) {
            $forms[] = FormMapper::map($item);
        }

        return $forms;
    }
}
