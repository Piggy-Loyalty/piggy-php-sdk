<?php
//
//namespace Piggy\Api\Models;
//
//class Model
//{
//    public static function parseResponse($response, $class): Model
//    {
//        $response = json_decode(json_encode($response->getData()), true);
//
//        return self::map($response, $class);
//    }
//
//    public static function map(array $data, $class): Model
//    {
//        foreach ($data as $k => $v) {
//            if (array_key_exists($k, $class->dependencies)) {
//                $dependencyClass = $class->dependencies[$k];
//
//                $model = new $dependencyClass();
//
//                $data = $data[$k];
//
//                $model = self::map($data, $model);
//
//                $class->{$k} = $model;
//            } else {
//                $class->{$k} = $v;
//            }
//        }
//
//        return $class;
//    }
//}