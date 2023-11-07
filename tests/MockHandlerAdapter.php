<?php


namespace Piggy\Api\Tests;

class MockHandlerAdapter
{
    private $results = [];
    private $idx = 0;

    public function append($res)
    {
        $this->results[] = $res;
    }

    public function reset()
    {
        $this->results = [];
        $this->idx = 0;
    }
}
