<?php

namespace Piggy\Api;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\ExceptionMapper;
use Piggy\Api\Exceptions\MalformedResponseException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Responses\Response;
use Piggy\Api\Http\Traits\SetsOAuthResources as OAuthResources;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class Environment
{
    use OAuthResources;

    private static $httpClient;

    /**
     * @var string
     */
    private static $baseUrl = "https://api.piggy.nl";

    /**
     * @var array
     */
    private static $headers = [
        'Accept' => 'application/json',
    ];

    private $apiKey;

    public function __construct(string $apiKey, string $baseUrl)
    {
        self::setApiKey($apiKey);
        self::setBaseUrl($baseUrl);
    }

    public static function configure($apiKey, $baseUrl)
    {
        new self($apiKey, $baseUrl);
    }

    public static function setApiKey(string $apiKey)
    {
        self::addHeader("Authorization", "Bearer $apiKey");
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $queryOptions
     * @return Response
     * @throws Exception|GuzzleException
     */
    public static function request(string $method, string $endpoint, $queryOptions = []): Response
    {
        if (!array_key_exists('Authorization', self::$headers)) {
            throw new Exception('Authorization not set yet.');
        }

        $url = self::$baseUrl . $endpoint;

        try {
            $rawResponse = self::getResponse($method, $url, [
                "headers" => self::$headers,
                "form_params" => $queryOptions,
            ]);

            return self::parseResponse($rawResponse);
        } catch (Exception $e) {
            $exceptionMapper = new ExceptionMapper();
            throw $exceptionMapper->map($e);
        }
    }

    /**
     * @param $response
     *
     * @return Response
     * @throws MalformedResponseException
     */
    private static function parseResponse($response): Response
    {
        try {
            $content = json_decode($response->getBody()->getContents());
        } catch (Throwable $exception) {
            throw new MalformedResponseException("Could not decode response");
        }

        if (!property_exists($content, "data")) {
            throw new MalformedResponseException("Invalid response given. Data property was missing from response.");
        }

        if (!property_exists($content, "meta")) {
            throw new MalformedResponseException("Invalid response given. Meta property was missing from response.");
        }

        return new Response($content->data, $content->meta);
    }

    /**
     * @return string
     */
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

    /**
     * @return array
     */
    public static function getHeaders(): array
    {
        return self::$headers;
    }

    /**
     * @param string $url
     * @param array $body
     * @return Response
     * @throws GuzzleException
     */
    public static function post(string $url, array $body): Response
    {
        return self::request('POST', $url, $body);
    }

    /**
     * @param string $url
     * @param array $body
     *
     * @return Response
     * @throws PiggyRequestException
     */
    public static function put(string $url, array $body): Response
    {
        return self::request('PUT', $url, $body);
    }

    /**
     * @param string $url
     * @param array $params
     *
     * @return Response
     * @throws GuzzleException
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
     * @param string $url
     * @param array $params
     *
     * @return Response
     * @throws GuzzleException
     */
    public static function destroy(string $url, array $body = []): Response
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
    private static function getResponse($method, $url, $options = []): ResponseInterface
    {
        if (hasGuzzle5()) {
            // v5 does not have form_params, so we need to apply a trick.
            if (isset($options['form_params'])) {
                $options['body'] = http_build_query($options['form_params']);
                unset($options['form_params']);

                $options['headers']['Content-Type'] = 'application/x-www-form-urlencoded';
            }

            $request = self::$httpClient->createRequest($method, $url, $options);
            return self::$httpClient->send($request);
        }

        $client = new GuzzleClient();
        return $client->request($method, $url, $options);
    }
}
