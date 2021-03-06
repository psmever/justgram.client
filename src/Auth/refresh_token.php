<?php require 'App/bootstrap.php';

use App\Client;

$client = new Client([
    'url' => '/api/v1/oauth/token',
    'method' => "post",
    'options' => [
        'headers' => [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.ACCESS_TOKEN ,
        ],
        'form_params' => [
            'grant_type' => 'refresh_token',
            'refresh_token' => REFRESH_TOKEN,
            'client_id' => CLIENT_ID,
            'client_secret' => CLIENT_SECRET,
            'scope' => '',
        ],
        'debug' => false,
        // 'http_errors' => false
    ]
]);

print_r($client->getResult());
echo PHP_EOL;
?>