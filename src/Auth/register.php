<?php require 'App/bootstrap.php';

use App\Client;

$client = new Client([
    'url' => '/api/v1/register',
    'method' => "post",
    'options' => [
        'headers' => [
            // 'Content-Type' => 'application/x-www-form-urlencoded',
        ],
        'form_params' => [
            "name" => "psmever",
            "email" => "psmever@gmail.com",
            "password" => "123456",
            "confirm_password" => "123456",
        ],
        'debug' => false,
        // 'http_errors' => false
    ]
]);

print_r($client->getResult());

echo PHP_EOL;
?>