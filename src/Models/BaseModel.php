<?php

namespace Piggy\Api\Models;

use DateTime;
use DateTimeImmutable;
use Illuminate\Support\Str;
use stdClass;
use UnitEnum;

abstract readonly class BaseModel
{
    /**
     * @return array<mixed, mixed>
     */
    public function toArray(
        bool $enumsAsValue = true,
        bool $childModelsAsObject = true
    ): array {
        return collect(get_object_vars($this))
            ->mapWithKeys(function ($value, $key) use ($enumsAsValue, $childModelsAsObject) {
                $snakeKey = Str::snake($key);

                return [$snakeKey => $this->transformValue($value, $enumsAsValue, $childModelsAsObject)];
            })
            ->toArray();
    }

    public function toObject(): stdClass
    {
        return (object) $this->toArray();
    }

    private function transformValue(mixed $value, bool $enumsAsValue, bool $childModelsAsObject): mixed
    {
        // Convert UnitEnum to its string value
        if ($enumsAsValue && $value instanceof UnitEnum) {
            return $value->value;
        }

        // Convert BaseModel to objects/arrays
        if ($value instanceof BaseModel) {
            return $childModelsAsObject ? $value->toObject() : $value->toArray($enumsAsValue, false);
        }

        // Convert DateTimeImmutable to atom string
        if ($value instanceof DateTimeImmutable) {
            return $value->format(DateTime::ATOM);
        }

        // Recursively transform arrays, including nested arrays of BaseModels
        if (is_array($value)) {
            return array_map(fn ($item) => $this->transformValue($item, $enumsAsValue, $childModelsAsObject), $value);
        }

        return $value;
    }
}
