<?php

namespace Analytics;

use Convertim\Analytics\ApiClient;
use Convertim\Analytics\ConvertimAnalyticsData;
use Convertim\Analytics\Exceptions\ConnectionErrorException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ApiClientTest extends TestCase
{
    /**
     * @var \Convertim\Analytics\ApiClient
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
        $this->mockHandler->append(new Response(201, [], json_encode([ 'message' => 'Created' ])));

        $response = $this->apiClient->doRequest(
            new ConvertimAnalyticsData(
                'device',
                'open',
                'dev',
                0,
                'mobile',
                '127.0.0.1',
                'hash'
            )
        );

        $formattedResponse = json_decode($response->getBody());

        $this->assertSame(201, $response->getStatusCode());
        $this->assertIsNotString($formattedResponse);
        $this->assertJsonStringEqualsJsonString(
            json_encode($formattedResponse),
            json_encode([ 'message' => 'Created' ])
        );
    }

    public function testSendPostRequestReturns500Response()
    {
        $this->mockHandler->append(new Response(500, [], '<html>Server error</html>'));

        $response = $this->apiClient->doRequest(
            new ConvertimAnalyticsData(
                'device',
                'open',
                'dev',
                0,
                'mobile',
                '127.0.0.1',
                'hash'
            )
        );

        $this->assertSame(500, $response->getStatusCode());
        $this->assertIsNotString($response->getBody());
    }

    public function testConnectionErrorExceptionIsThrownWhenRequestExceptionDoesntContainResponse()
    {
        $this->expectException(ConnectionErrorException::class);

        $this->mockHandler->append(new RequestException('Error Communicating with Server', new Request('GET', 'test')));

        $this->apiClient->doRequest(
            new ConvertimAnalyticsData(
                'device',
                'open',
                'dev',
                0,
                'mobile',
                '127.0.0.1',
                'hash'
            )
        );
    }

    public function testResponseErrorExceptionIsThrownForResponseWithInvalidJsonData()
    {
        $this->mockHandler->append(new Response(201, [], '{"someData":xxx}'));

        $response = $this->apiClient->doRequest(
            new ConvertimAnalyticsData(
                'device',
                'open',
                'dev',
                0,
                'mobile',
                '127.0.0.1',
                'hash'
            )
        );

        $formattedResponse = json_decode($response->getBody());

        $this->assertSame(201, $response->getStatusCode());
        $this->assertNull($formattedResponse);
    }
}
