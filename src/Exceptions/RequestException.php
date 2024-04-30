<?php

namespace Piggy\Api\Exceptions;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use Throwable;

/**
 * Class RequestException
 */
class RequestException extends Exception
{
    /**
     * @var string
     */
    protected $message;

    /**
     * HTTP-status code
     *
     * @var int
     */
    protected $statusCode;

    /**
     * Piggy Internal Code. Useful for extra debugging.
     *
     * @var int
     */
    protected $code;

    /**
     * If given, an array of errors.
     *
     * @var array
     */
    protected $errors;

    /**
     * The original, json decoded response.
     *
     * @var Response|null
     */
    protected $response;

    /**
     * RequestException constructor.
     *
     * @param  array  $errors
     */
    public function __construct(
        $message,
        $statusCode,
        $code,
        $errors = [],
        ?Response $response = null
    ) {
        parent::__construct($message);
        $this->message = $message;
        $this->statusCode = $statusCode;
        $this->code = $code;
        $this->errors = $errors;
        $this->response = $response;
    }

    /**
     * @return RequestException
     *
     * @throws RequestException
     */
    public static function createFromGuzzleException(GuzzleException $guzzleException)
    {
        // Not all Guzzle Exceptions implement hasResponse() / getResponse()
        if (method_exists($guzzleException, 'hasResponse') && method_exists($guzzleException, 'getResponse')) {
            if ($guzzleException->hasResponse()) {
                return static::createFromResponse($guzzleException->getResponse());
            }
        }

        return new self($guzzleException->getMessage(), $guzzleException->getCode(), null, null);
    }

    /**
     * @return RequestException
     *
     * @throws RequestException
     */
    public static function createFromResponse(Response $response, ?Throwable $previous = null)
    {
        $body = $response->getBody();

        try {
            $object = @json_decode($body);
        } catch (Exception $exception) {
            throw new self("Unable to decode response: '$body'");
        }

        return new self(
            $object->message,
            $response->getStatusCode(),
            $object->code,
            $previous
        );
    }

    /**
     * @return Response|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return bool
     */
    public function hasResponse()
    {
        return $this->response !== null;
    }
}
