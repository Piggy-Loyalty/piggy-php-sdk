<?php

namespace Piggy\Api\Http\Responses;

use Piggy\Api\Models\Shop;
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

    public function getUuid()
    {
        return $this->getData()->uuid;
    }

    public function shop()
    {
        $shop = $this->get();
        return $shop;
    }

    public function voucher()
    {
        $voucher = $this->get();

        return $voucher;
    }

    public function get(?string $type = null, ?string $model = null)
    {
        $data = array($this->getData());
//        $data["shop"] = $data[0];
        $data["voucher"] = $data[0];
        unset($data[0]);

//        return $this->data[$type] = new $model($this->data[$type]);
    }

}