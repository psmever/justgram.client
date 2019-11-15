<?php require 'App/bootstrap.php';

$http = new \GuzzleHttp\Client();

// $response = $http->request('POST', BASE_URL . '/' . '/oauth/token', [
//     'headers' => [
//         'cache-control' => 'no-cache',
//         'Content-Type' => 'application/x-www-form-urlencoded'
//     ],
//     'form_params' => [
//         'client_id' => '9',
//         'client_secret' => 'i03Ua2gDlnHCgI4GWu2MAPEM1jkdXjsBHrHU6bYU',
//         'grant_type' => 'password',
//         'username' => 'sunnerdev@gmail.com',
//         'password' => 'xxxxxx',
//         'scope' => '',
//     ],
// ]);



// $response = $http->request('POST', BASE_URL . '/' . '/api/login', [
//     'headers' => [
//         'cache-control' => 'no-cache',
//         'Content-Type' => 'application/x-www-form-urlencoded'
//     ],
//     'form_params' => [
//         'email' => 'psmever1@gmail.com',
//         'password' => '123456',
//     ],
// ]);


// print_r(json_decode((string) $response->getBody(), true));
// print_r($response);




// $http = new GuzzleHttp\Client;

// $response = $http->post(BASE_URL . '/' . 'oauth/token', [
//     'form_params' => [
//         'grant_type' => 'refresh_token',
//         'refresh_token' => 'the-refresh-token',
//         'client_id' => '11',
//         'client_secret' => 'EjM2qW1Ft3Smyt29UJyCoK1rm1XuPz7n7vBsMBgr',
//         'scope' => '',
//     ],
// ]);

// print_r($response);




$http = new GuzzleHttp\Client;

$response = $http->get(BASE_URL . '/oauth/clients');

print_r($response);





echo PHP_EOL;
?>