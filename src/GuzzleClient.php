<?php

namespace MobinetApi;
use GuzzleHttp\Client;
use Psr\Http\Message\StreamInterface;

class GuzzleClient
{

    private const  BASE_URL = 'https://api.mobinet.io/';
    /**
     * @var \GuzzleHttp\Client
     */
    private Client $client;


    public function __construct()
    {

        $headers = [
            'Accept'        => 'application/json',
        ];
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => self::BASE_URL,
            // You can set any number of default request options.
            'timeout'  => 5.0,
            'headers'  => $headers
        ]);
    }


    public function  getClient(): Client
    {
        return $this->client;
    }


    public static function getResponse(StreamInterface $response):array{

        return json_decode($response,true);
    }

}