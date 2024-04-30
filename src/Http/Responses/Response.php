<?php

namespace Piggy\Api\Http\Responses;

use stdClass;

/**
 * Class Response
 */
class Response
{
    protected $data;

    /**
     * @var stdClass
     */
    protected $meta;

    /**
     * Response constructor.
     */
    public function __construct($data, $meta)
    {
        $this->data = $data;
        $this->meta = $meta;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getMeta()
    {
        return $this->meta;
    }
}
