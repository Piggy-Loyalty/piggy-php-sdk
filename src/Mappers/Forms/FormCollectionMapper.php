<?php

namespace Piggy\Api\Mappers\Forms;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Form;
use stdClass;

class FormCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return Form[]
     */
    public function map(array $data): array
    {
        $mapper = new FormMapper;

        $forms = [];
        foreach ($data as $item) {
            $forms[] = $mapper->map($item);
        }

        return $forms;
    }
}
