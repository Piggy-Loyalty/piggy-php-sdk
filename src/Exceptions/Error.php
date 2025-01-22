<?php

namespace Piggy\Api\Exceptions;

class Error
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var string|array
     */
    protected $errors;

    /**
     * @param  string|array  $errors
     */
    public function __construct(string $key, $errors)
    {
        $this->key = $key;
        $this->errors = $errors;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return mixed[]
     */
    public function getErrors(): array
    {
        if (is_string($this->errors)) {
            return [$this->errors];
        }

        return $this->errors;
    }
}
