<?php

namespace OAuth;

use Convertim\OAuth\ApiClient;
use Convertim\OAuth\Exceptions\ConnectionErrorException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ApiClientTest extends TestCase
{
    /**
     * @var \Convertim\OAuth\ApiClient
     */
    private $apiClient;

    /**
     * @var \GuzzleHttp\Handler\MockHandler
     */
    private $mockHandler;

    protected function setUp(): void
    {
        $this->mockHandler = new MockHandler();
        $this->apiClient = new ApiClient(
            new Client([
                'handler' => $this->mockHandler,
            ]),
            false
        );
    }

    public function testSendPostRequestReturnsConvertimAnalyticsResponse()
    {
        $this->mockHandler->append(new Response(200, [], json_encode([ 'token' => 'token123' ])));

        $response = $this->apiClient->doRequest('clientId', 'clientSecret', 'authCode');

        $formattedResponse = json_decode($response->getBody());

        $this->assertSame(200, $response->getStatusCode());
        $this->assertIsNotString($formattedResponse);
        $this->assertJsonStringEqualsJsonString(
            json_encode($formattedResponse),
            json_encode([ 'token' => 'token123' ])
        );
    }

    public function testSendPostRequestReturns500Response()
    {
        $this->mockHandler->append(new Response(500, [], '<html>Server error</html>'));

        $response = $this->apiClient->doRequest('clientId', 'clientSecret', 'authCode');

        $this->assertSame(500, $response->getStatusCode());
        $this->assertIsNotString($response->getBody());
    }

    public function testConnectionErrorExceptionIsThrownWhenRequestExceptionDoesntContainResponse()
    {
        $this->expectException(ConnectionErrorException::class);

        $this->mockHandler->append(new RequestException('Error Communicating with Server', new Request('GET', 'test')));
        $this->apiClient->doRequest('clientId', 'clientSecret', 'authCode');
    }

    public function testResponseErrorExceptionIsThrownForResponseWithInvalidJsonData()
    {
        $this->mockHandler->append(new Response(200, [], '{"someData":xxx}'));
        $response = $this->apiClient->doRequest('clientId', 'clientSecret', 'authCode');

        $formattedResponse = json_decode($response->getBody());

        $this->assertSame(200, $response->getStatusCode());
        $this->assertNull($formattedResponse);
    }
}
