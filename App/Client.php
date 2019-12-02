<?php

namespace App;

class Client
{
    protected $method;
    protected $options;
    protected $headers;
    protected $url;
    protected $client;
    protected $access_token;
    protected $refresh_token;

    public function __construct($params)
	{
        $this->client = new \GuzzleHttp\Client([
            "base_uri" => BASE_URL,
        ]);

        // $this->headers = [
        //     'Authorization' => 'Bearer ' . $token,
        //     'Accept'        => 'application/json',
        // ];

        $this->method = $params['method'];
        $this->options = $params['options'];
        $this->url = $params['url'];

        // $this->init();
    }

    private function init()
    {

        $returnData = array();

        try {
            if($this->method == 'post')
            {
                $response = $this->client->post($this->url, $this->options);
            }
            else if($this->method == 'get')
            {
                $response = $this->client->get($this->url, $this->options);
            }

            $statusCode = $response->getStatusCode();

            // echo "getStatusCode : {$response->getStatusCode()}";
            // echo PHP_EOL;
            // print_r($response->getBody());
            $contents = json_decode($response->getBody()->getContents(), true);

            if(isset($contents['access_token']) && $contents['access_token']) {
                // file_put_contents(ACCESS_TOKEN_FILE, $contents['access_token'], FILE_APPEND | LOCK_EX);
                file_put_contents(ACCESS_TOKEN_FILE, $contents['access_token'], LOCK_EX);
            }

            if(isset($contents['refresh_token']) && $contents['refresh_token']) {
                // file_put_contents(REFRESH_TOKEN_FILE, $contents['refresh_token'], FILE_APPEND | LOCK_EX);
                file_put_contents(REFRESH_TOKEN_FILE, $contents['refresh_token'], LOCK_EX);
            }

            return [
                'state' => true,
                'code' => $response->getStatusCode(),
                'contents' => $contents
            ];

        } catch ( \GuzzleHttp\Exception\ClientException $e) {
            // echo ":::ClientException:::".PHP_EOL;
            // echo $e->getMessage();

            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            // print_r(json_decode($responseBodyAsString, true));

            $returnData = [
                'state' => ":::ClientException:::",
                'error_message' => $e->getMessage(),
                // 'getresponse' => $e->getResponse(),
                'getcontents' => $response->getBody()->getContents(),
                'contents' => json_decode($responseBodyAsString, true),
            ];

        } catch ( \GuzzleHttp\Exception\ServerException $e) {
            // echo ":::ServerException:::".PHP_EOL;
            // echo $e->getMessage();
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            // print_r(json_decode($responseBodyAsString, true));

            $returnData = [
                'state' => ":::ServerException:::",
                'error_message' => $e->getMessage(),
                // 'getresponse' => $e->getResponse(),
                'getcontents' => $response->getBody()->getContents(),
                'contents' => json_decode($responseBodyAsString, true),
            ];

        } catch ( \GuzzleHttp\Exception\BadResponseException $e) {
            // echo ":::BadResponseException:::".PHP_EOL;
            $returnData = [
                'state' => ":::BadResponseException:::",
                'error_message' => $e->getMessage(),
                // 'getresponse' => $e->getResponse(),
                'getcontents' => $response->getBody()->getContents(),
                'contents' => json_decode($responseBodyAsString, true),
            ];
        }


        return $returnData;
    }


    public function getResult()
    {
        return $this->init();
    }


    public static function test()
    {
        echo __FUNCTION__;
    }
}