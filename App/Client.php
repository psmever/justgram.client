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
        try {
            if($this->method == 'post')
            {
                // $this->client->setDefaultOption('headers', [
                //     'Content-Type' => 'application/x-www-form-urlencoded',
                //     'Accept'        => 'application/json',
                //     'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiYzBkNTg0NTkwZGIwMTkwNTNjYzZiYWQ3MTE5NWM1MGQ0YjQ4MmUwYzlkMGQ4ZGE4Y2Y5MGQ1MGIzYjMzOGFlOTRmNTEzYmIyNmI1M2FlMTUiLCJpYXQiOjE1NzQ0OTk3OTksIm5iZiI6MTU3NDQ5OTc5OSwiZXhwIjoxNTc0NDk5ODU5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ImVI1-WEyxtBkThYYxI-DDX5l7hsgN4lQtfqscnvggFcLGLKxYWlDcID74-L9I1puqIcxLdAzppZ34LBw1rtDlWr1xzx7a1Bb-Ab2i0UMeuhFFw9JwrUI8wkXuGruZyzj2nAjkcMmmqLmqeHrwW1ih3CpYBTJ3sX_sFrF_oS0cW3SkoQ3wPcIzx02tNvL4mXBpoxWayG63LQoeOHUP5fj_vueHJmQSU37wZFYM7bcyOU1sisdoRRDDStg5TdB-w6ujJ0r33ROibLb7xfMNkmOTu9b8ZRSO6vbVWX9aIQfF_uGLRFWaD3k8vVeUw3NNN8mAz6SeeIE-oL0leVhT9Fi7_ds5lOOcp53o_-CfRPS9J0iVnc6NeSq-mlJS2OmcdGiSpfb3SAX8aDfKTRiw3s20vK_iGuQmbG4aDR1TvXY2fgC9rTG-eUKGLADCbPUH7hai2IHNztTucvBo3VtptpgjqYZnGxHZiaSlRaLwuwYtiK1CsNmnc1gXZmli9B1dm-JwH5pwyBzwHf7fO-ouheFuZCFxaHbpsj06pSEQ9LVvGveesizZSegSxKuNYIxJ0UXeUaz9p_uRdi1SAw0w7IkpfZcH8Ym1ln49Wh9WULri3r-GPG11FLHkqXbUfBPksK8eOcLEX2lBfeWre9amint81MZvEsj8qyxfVELKOaA0s' ,
                // ]);

                $response = $this->client->post($this->url, $this->options);
            }

            $statusCode = $response->getStatusCode();

            // echo "getStatusCode : {$response->getStatusCode()}";
            // echo PHP_EOL;
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

            return [
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

            return [
                'state' => ":::ServerException:::",
                'error_message' => $e->getMessage(),
                // 'getresponse' => $e->getResponse(),
                'getcontents' => $response->getBody()->getContents(),
                'contents' => json_decode($responseBodyAsString, true),
            ];

        } catch ( \GuzzleHttp\Exception\BadResponseException $e) {
            // echo ":::BadResponseException:::".PHP_EOL;
            return [
                'state' => ":::BadResponseException:::",
                'error_message' => $e->getMessage(),
                // 'getresponse' => $e->getResponse(),
                'getcontents' => $response->getBody()->getContents(),
                'contents' => json_decode($responseBodyAsString, true),
            ];
        }
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