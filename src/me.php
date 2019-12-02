<?php require 'App/bootstrap.php';

use App\Client;

$client = new Client([
    'url' => '/api/v1/me',
    'method' => "get",
    'options' => [
        'headers' => [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.ACCESS_TOKEN ,
        ],
        'form_params' => [],
        'debug' => false,
        // 'http_errors' => false
    ]
]);

print_r($client->getResult());
echo PHP_EOL;
?>