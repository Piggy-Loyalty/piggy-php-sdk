<?php

namespace Piggy\Api;

use Piggy\Api\Http\Responses\Response;
use Piggy\Api\Models\Promotion;
use stdClass;

class Model
{
    protected static $allowedNestedModels = [
        "promotion",
//        "contact",
    ];

    protected $values;

//    protected $data = [];

    protected $uuid;

    public function getValues()
    {
        return $this->values;
    }

    public function getMeta(): stdClass
    {
        return $this->meta;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public static function getClassNameInLowerCase($class): string
    {
        $className = new \ReflectionClass($class);

        return strtolower($className->getShortName());
    }

    public static function createTypedClassFromStdClass($stdClass, $class, $nestedClass = null): Model
    {
        $classNameAsKey = self::getClassNameInLowerCase($class);
//        var_dump('classname as key: ' . $classNameAsKey);

        $instance = new $class();

        foreach ($stdClass as $property => $value) {
            if (in_array($property, self::$allowedNestedModels)) {
                $nestedInstance = $nestedClass::createTypedClassFromStdClass($value, Promotion::class);
                $instance->$property = $nestedInstance;
                var_dump($nestedInstance);
            }
            else {
                $instance->$property = $value;
            }
        }

        return $instance;
    }
}