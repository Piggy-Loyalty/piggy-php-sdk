<?php

namespace Piggy\Api;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\ExceptionMapper;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\MalformedResponseException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Responses\Response;
use Piggy\Api\Http\Traits\SetsOAuthResources as OAuthResources;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class ApiClient
{
    use OAuthResources;

    private static $httpClient;

    /**
     * @var string
     */
    private static $baseUrl = 'https://api.piggy.nl';

    /**
     * @var array
     */
    private static $headers = [
        'Accept' => 'application/json',
    ];

    /**
     * @var string
     */
    private $apiKey;

    public function __construct(string $apiKey, string $baseUrl)
    {
        self::setApiKey($apiKey);
        self::setBaseUrl($baseUrl);
        self::$httpClient = new GuzzleClient();
    }

    /**
     * @return void
     */
    public static function configure($apiKey, $baseUrl)
    {
        new self($apiKey, $baseUrl);
    }

    /**
     * @return void
     */
    public static function setApiKey(string $apiKey)
    {
        self::addHeader('Authorization', "Bearer $apiKey");
    }

    /**
     * @throws Exceptions\MaintenanceModeException
     * @throws Exceptions\PiggyRequestException
     * @throws GuzzleException
     */
    public static function request(string $method, string $endpoint, array $queryOptions = []): Response
    {
        if (! array_key_exists('Authorization', self::$headers)) {
            throw new Exception('Authorization not set yet.');
        }

        $url = self::$baseUrl.$endpoint;

        try {
            $rawResponse = self::getResponse($method, $url, [
                'headers' => self::$headers,
                'form_params' => $queryOptions,
            ]);

            return self::parseResponse($rawResponse);
        } catch (Exception $e) {
            $exceptionMapper = new ExceptionMapper();
            $exception = $exceptionMapper->map($e);
            throw $exception;
        }
    }

    /**
     * @throws MalformedResponseException
     */
    private static function parseResponse($response): Response
    {
        try {
            $content = json_decode($response->getBody()->getContents());
        } catch (Throwable $exception) {
            throw new MalformedResponseException('Could not decode response');
        }

        if (! property_exists($content, 'data')) {
            throw new MalformedResponseException('Invalid response given. Data property was missing from response.');
        }

        //        if (!property_exists($content, "meta")) {
        //            throw new MalformedResponseException("Invalid response given. Meta property was missing from response.");
        //        }

        return new Response($content->data, $content->meta);
    }

    public static function getBaseUrl(): string
    {

        return self::$baseUrl;
    }

    public static function setBaseUrl($baseUrl): void
    {
        self::$baseUrl = $baseUrl;
    }

    public static function addHeader($key, $value): void
    {
        self::$headers[$key] = $value;
    }

    public static function getHeaders(): array
    {
        return self::$headers;
    }

    /**
     * @throws MaintenanceModeException
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public static function post(string $url, array $body): Response
    {
        return self::request('POST', $url, $body);
    }

    /**
     * @throws MaintenanceModeException
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public static function put(string $url, array $body): Response
    {
        return self::request('PUT', $url, $body);
    }

    /**
     * @throws MaintenanceModeException
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public static function get(string $url, array $params = []): Response
    {
        $query = http_build_query($params);

        if ($query) {
            $url = "{$url}?{$query}";
        }

        return self::request('GET', $url);
    }

    /**
     * @throws MaintenanceModeException
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public static function delete(string $url, array $body = []): Response
    {
        $query = http_build_query($body);

        if ($query) {
            $url = "{$url}?{$query}";
        }

        return self::request('DELETE', $url);
    }

    /**
     * @throws GuzzleException
     */
    private static function getResponse($method, $url, array $options = []): ResponseInterface
    {
        return self::$httpClient->request($method, $url, $options);
    }
}
