<?php

namespace Piggy\Api\Http\Responses;

use stdClass;

class Response
{
    protected stdClass $data;

    /**
     * @var stdClass|array<mixed, mixed>
     */
    protected stdClass|array $meta;

    /**
     * Response constructor.
     *
     * @param  stdClass|array<mixed, mixed>  $meta
     */
    public function __construct(stdClass $data, stdClass|array $meta)
    {
        $this->data = $data;
        $this->meta = $meta;
    }

    public function getData(): stdClass
    {
        return $this->data;
    }

    /**
     * @return stdClass|array<mixed, mixed>
     */
    public function getMeta(): stdClass|array
    {
        return $this->meta;
    }
}
