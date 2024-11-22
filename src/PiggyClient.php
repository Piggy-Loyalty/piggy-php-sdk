<?php

namespace Piggy\Api;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\ExceptionMapper;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\MalformedResponseException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\Http\InitializesEndpoints;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Throwable;
use StdClass;

class PiggyClient
{
    use InitializesEndpoints;

    private ClientInterface $httpClient;

    private string $baseUrl = 'https://api.piggy.nl/api/public/v4/';

    /**
     * @var string[]
     */
    protected array $headers = [
        'Accept' => 'application/json',
    ];

    /**
     * BaseClient constructor.
     */
    public function __construct(string $personalAccessToken, ?ClientInterface $client = new GuzzleClient)
    {
        $this->setPersonalAccessToken($personalAccessToken);

        $this->httpClient = $client;

        $this->initializeEndpoints();
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    public function setLeatPartner(string $leatPartner): void
    {
        $this->addHeader('X-Leat-Partner', $leatPartner);
    }

    public function setLeatAccount(string $leatAccount): void
    {
        $this->addHeader('X-Leat-Account', $leatAccount);
    }

    /**
     * @return $this
     */
    public function setPersonalAccessToken(string $personalAccessToken): self
    {
        $this->addHeader('Authorization', "Bearer $personalAccessToken");

        return $this;
    }

    public function addHeader(string $key, string $value): void
    {
        $this->headers[$key] = $value;
    }

    /**
     * @return string[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param  mixed[]  $body
     *
     * @throws PiggyRequestException
     */
    public function post(string $url, array $body): Response
    {
        return $this->request('POST', $url, $body);
    }

    /**
     * @param  mixed[]  $body
     *
     * @throws PiggyRequestException
     */
    public function put(string $url, array $body): Response
    {
        return $this->request('PUT', $url, $body);
    }

    /**
     * @param  mixed[]  $params
     *
     * @throws PiggyRequestException
     */
    public function get(string $url, array $params = []): Response
    {
        $query = http_build_query($params);

        if ($query) {
            $url = "$url?$query";
        }

        return $this->request('GET', $url);
    }

    /**
     * @param  mixed[]  $params
     *
     * @throws PiggyRequestException
     */
    public function delete(string $url, array $params = []): Response
    {
        $query = http_build_query($params);

        if ($query) {
            $url = "$url?$query";
        }

        return $this->request('DELETE', $url);
    }

    /**
     * @param array<string, string> $queryOptions
     *
     * @throws GuzzleException
     * @throws MaintenanceModeException
     * @throws PiggyRequestException
     * @throws Exception
     */
    private function request(string $method, string $endpoint, array $queryOptions = []): Response
    {
        // TODO: Add User-Agent header

        if (! array_key_exists('Authorization', $this->headers)) {
            throw new Exception('Authorization not set yet.');
        }

        $url = $this->baseUrl.$endpoint;

        try {
            $rawResponse = $this->getResponse($method, $url, [
                'headers' => $this->headers,
                'form_params' => $queryOptions,
            ]);

            return $this->parseResponse($rawResponse);
        } catch (Exception $e) {
            $exceptionMapper = new ExceptionMapper();
            throw $exceptionMapper->map($e);
        }
    }

    /**
     * @param  mixed[]  $options
     *
     * @throws GuzzleException
     */
    private function getResponse(string $method, string|UriInterface $url, array $options = []): ResponseInterface
    {
        return $this->httpClient->request($method, $url, $options);
    }

    /**
     * @throws MalformedResponseException
     */
    private function parseResponse(ResponseInterface $response): Response
    {
        try {
            /** @var stdClass $content */
            $content = json_decode($response->getBody()->getContents());
        } catch (Throwable) {
            throw new MalformedResponseException('Could not decode response');
        }

        if (! property_exists($content, 'data')) {
            throw new MalformedResponseException('Invalid response given. Data property was missing from response.');
        }

        return new Response($content->data, $content->meta ?? []);
    }
}
