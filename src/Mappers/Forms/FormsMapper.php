<?php

namespace Piggy\Api\Mappers\Forms;

/**
 * Class FormsMapper
 */
class FormsMapper
{
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
