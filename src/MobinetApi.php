<?php

namespace MobinetApi;

use GuzzleHttp\Client;
use MobinetApi\Response\Device\AvailableDevice;
use MobinetApi\Response\LoginResponse;

class MobinetApi
{


    private Client $guzzleClient;
    private $apiToken;

    public function __construct()
    {
        $this->guzzleClient = (new GuzzleClient())->getClient();
    }


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAvailableDevice()
    {

        $response = $this->guzzleClient->request('GET','device',[
            'perPage' => 40,
            'page'    => 0,
            'headers' => $this->getAuthorizationHeader()
        ]);
        return AvailableDevice::immutable(GuzzleClient::getResponse($response->getBody()));
    }

    private function getAuthorizationHeader(): array
    {
        return ['Authorization' => 'Bearer ' . $this->apiToken];
    }
}