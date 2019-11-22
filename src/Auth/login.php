<?php require 'App/bootstrap.php';

use App\Client;

$client = new Client([
    'url' => '/api/v1/login',
    'method' => "post",
    'options' => [
        'form_params' => [
            "email" => "psmever@gmail.com",
            "password" => "123456",
        ],
        'debug' => false,
        // 'http_errors' => false
    ]
]);
echo PHP_EOL;
?>