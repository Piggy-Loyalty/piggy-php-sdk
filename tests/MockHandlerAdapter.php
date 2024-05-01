<?php

namespace Piggy\Api\Tests;

use GuzzleHttp\Psr7\Response;

class MockHandlerAdapter
{
    private $results = [];

    private $idx = 0;

    public function append(Response $res)
    {
        $this->results[] = $res;
    }

    public function reset()
    {
        $this->results = [];
        $this->idx = 0;
    }
}
