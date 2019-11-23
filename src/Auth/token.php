<?php require 'App/bootstrap.php';

use App\Client;

$client = new Client([
    'url' => '/api/v1/oauth/token',
    'method' => "post",
    'options' => [
        'headers' => [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ],
        'form_params' => [
            'grant_type' => 'password',
            'client_id' => CLIENT_ID,
            'client_secret' => CLIENT_SECRET,
            'username' => 'psmever@gmail.com',
            'password' => '123456',
            'scope' => '',
        ],
        'debug' => false,
        // 'http_errors' => false
    ]
]);

print_r($client->getResult());

echo PHP_EOL;
?>