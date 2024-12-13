<?php

namespace Piggy\Api\Http;

use stdClass;

class Response
{
    /**
     * @param  stdClass|stdClass[]|array<mixed, mixed>|string|null  $data
     * @param  stdClass|array<mixed, mixed>  $meta
     */
    public function __construct(
        public stdClass|array|string|null $data,
        public stdClass|array $meta
    ) {
        //
    }

    /**
     * @return stdClass|stdClass[]|array<mixed, mixed>|string|null
     */
    public function getData(): array|stdClass|string|null
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
