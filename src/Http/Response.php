<?php

namespace Piggy\Api\Http;

use stdClass;

class Response
{
    /**
     * @var stdClass|array<mixed, mixed>|string
     */
    protected stdClass|array|string $data;

    /**
     * @var stdClass|array<mixed, mixed>
     */
    protected stdClass|array $meta;

    /**
     * Response constructor.
     *
     * @param  stdClass|array<mixed, mixed>|string  $data
     * @param  stdClass|array<mixed, mixed>  $meta
     */
    public function __construct(stdClass|array|string $data, stdClass|array $meta)
    {
        $this->data = $data;
        $this->meta = $meta;
    }

    /**
     * @return stdClass|array<mixed, mixed>|string
     */
    public function getData(): array|stdClass|string
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
