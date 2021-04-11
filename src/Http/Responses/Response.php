<?php

namespace Piggy\Api\Http\Responses;

use stdClass;

/**
 * Class Response
 * @package Piggy\Api\Http
 */
class Response
{
    /**
     * @var stdClass
     */
    private $data;
    /**
     * @var stdClass
     */
    private $meta;

    /**
     * Response constructor.
     * @param object $data
     * @param object $meta
     */
    public function __construct(object $data, object $meta)
    {
        $this->data = $data;
        $this->meta = $meta;
    }

    /**
     * @return object
     */
    public function getData(): object
    {
        return $this->data;
    }

    /**
     * @return object
     */
    public function getMeta(): object
    {
        return $this->meta;
    }
}
