<?php
require 'App/bootstrap.php';

$http = new \GuzzleHttp\Client();

$http = new GuzzleHttp\Client;

$response = $http->get(BASE_URL . '/front/test');

print_r($response->getBody());





echo PHP_EOL;