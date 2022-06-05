<?php

namespace MobinetApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;
use MobinetApi\Response\Device\DeviceCollection;
use MobinetApi\Response\LoginResponse;
use MobinetApi\Response\Proxy\ProxyCollection;

class MobinetApi
{


    private Client $guzzleClient;
    private string $apiToken;

    public function __construct()
    {
        $this->guzzleClient = (new GuzzleClient())->getClient();
    }


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException|\JsonException
     */
    public function login(string $email, string $password)
    {
        $response = $this->guzzleClient->request('POST', 'user/login', [
            'form_params' => [
                'email' => $email,
                'password' => $password
            ]
        ]);
        $loginResponse = LoginResponse::immutable(GuzzleClient::getResponse($response->getBody()));
        $this->apiToken = $loginResponse->token;
        return $loginResponse;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException|\JsonException
     */
    public function getAvailableDevice(): DeviceCollection
    {

        $response = $this->guzzleClient->request('GET', 'device', [
            'perPage' => 40,
            'page' => 0,
            'headers' => $this->getAuthorizationHeader()
        ]);
        return new DeviceCollection(GuzzleClient::getResponse($response->getBody()));

    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException|\JsonException
     */
    public function getAvailableProxies():ProxyCollection
    {

        $response = $this->guzzleClient->request('GET','proxy',[
            'perPage' => 20,
            'page'    => 0,
            'headers' => $this->getAuthorizationHeader()
        ]);
        return new ProxyCollection(GuzzleClient::getResponse($response->getBody()));
    }

    public function proxiesChangeIp(ProxyCollection $proxyCollection): PromiseInterface
    {

        $requests = function () use ($proxyCollection) {
            foreach ($proxyCollection->items as $item) {
                $uri = 'proxy/rotate/' . $item->id;
                yield function () use ($uri) {
                    return $this->guzzleClient->postAsync($uri, [

                        'headers' => $this->getAuthorizationHeader()

                    ]);
                };
            }
        };
        $pool = new Pool($this->guzzleClient, $requests(), [
            'concurrency' => 5,
            'fulfilled' => static function (Response $response, $index) {
                echo 'Ok'.$index.PHP_EOL;
                echo $response->getStatusCode().PHP_EOL;
            },
            'rejected' => static function (RequestException $reason, $index) {
            },
        ]);

        // Initiate the transfers and create a promise
        $promise = $pool->promise();

        // Force the pool of requests to complete.
        $promise->wait(true);
        return $promise;
    }

    private function getAuthorizationHeader(): array
    {
        return ['Authorization' => 'Bearer ' . $this->apiToken];
    }
}