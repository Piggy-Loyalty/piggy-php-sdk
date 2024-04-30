<?php

namespace Piggy\Api\Exceptions;

class Error
{
    protected $key;

    /**
     * @var array
     */
    protected $errors;

    /**
     * Error constructor.
     */
    public function __construct($key, $errors)
    {
        $this->key = $key;
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
