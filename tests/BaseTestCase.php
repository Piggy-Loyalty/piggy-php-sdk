<?php

namespace Piggy\Api\Tests;

use DateTime;
use DateTimeInterface;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use PHPUnit\Framework\TestCase;

use function Piggy\Api\hasGuzzle5;

class BaseTestCase extends TestCase
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var MockHandler
     */
    protected $mockHandler;

    protected function setUp(): void
    {
        parent::setUp();

        if (hasGuzzle5()) {
            $mock = new MockHandlerAdapter();
            $httpClient = new HttpClient(['handler' => $mock]);
        } else {
            $mock = new MockHandler();
            $handlerStack = HandlerStack::create($mock);
            $httpClient = new HttpClient(['handler' => $handlerStack]);
        }

        $this->httpClient = $httpClient;
        $this->mockHandler = $mock;
    }

    /**
     * @param  mixed  $data
     */
    protected function addExpectedResponse($data, ?array $meta = null, int $code = 200)
    {
        $payload = json_encode([
            'data' => $data,
            'meta' => $meta,
        ]);

        if (hasGuzzle5()) {
            $stream = fopen('php://memory', 'r+');
            fwrite($stream, $payload);
            rewind($stream);

            $streamWrapper = new Stream($stream);
            $response = new Response($code, [], $streamWrapper);
        } else {
            $response = new Response($code, [], $payload);
        }

        $this->mockHandler->append($response);
    }

    /**
     * @return DateTime|false
     */
    public function parseDate(string $date)
    {
        return DateTime::createFromFormat(DateTimeInterface::ATOM, $date);
    }

    public function getHttpClient(): HttpClient
    {
        return $this->httpClient;
    }

    public function getMockHandler(): MockHandler
    {
        return $this->mockHandler;
    }
}
