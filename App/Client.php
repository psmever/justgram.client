<?php

namespace App;

class Client
{
    protected $method;
    protected $options;
    protected $url;
    protected $client;

    public function __construct($params)
	{
        $this->client = new \GuzzleHttp\Client(["base_uri" => BASE_URL]);

        $this->method = $params['method'];
        $this->options = $params['options'];
        $this->url = $params['url'];

        $this->init();
    }

    private function init()
    {
        try {

            if($this->method == 'post')
            {
                $response = $this->client->post($this->url, $this->options);
            }

            $statusCode = $response->getStatusCode();

            echo "getStatusCode : {$response->getStatusCode()}";
            echo PHP_EOL;
            print_r(json_decode($response->getBody()->getContents(), true));

        } catch ( \GuzzleHttp\Exception\ClientException $e) {
            echo ":::ClientException:::".PHP_EOL;
            echo $e->getMessage();

            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            print_r(json_decode($responseBodyAsString, true));

        } catch ( \GuzzleHttp\Exception\ServerException $e) {
            echo ":::ServerException:::".PHP_EOL;

            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            print_r(json_decode($responseBodyAsString, true));

        } catch ( \GuzzleHttp\Exception\BadResponseException $e) {
            echo ":::BadResponseException:::".PHP_EOL;
        }
    }

    public static function test()
    {
        echo __FUNCTION__;
    }
}