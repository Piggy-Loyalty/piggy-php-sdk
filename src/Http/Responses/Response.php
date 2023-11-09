<?php

namespace Piggy\Api\Http\Responses;

use stdClass;

/**
 * Class Response
 * @package Piggy\Api\Http
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
     * @param $data
     * @param $meta
     */
    public function __construct($data, $meta)
    {
        $this->data = $data;
        $this->meta = $meta ?? new stdClass();
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
