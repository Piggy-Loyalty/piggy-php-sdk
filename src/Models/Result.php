<?php

namespace Piggy\Api\Models;

use Piggy\Api\Http\Responses\Response;

class Result
{
    private $response1;

    public function __construct($response)
    {
        $this->response1 = $response;
    }

    private function get(string $type)
    {
        return $this->response1[$type];
    }

    public function shop()
    {
        $shop = $this->get('shop');

        return $shop;
    }
}