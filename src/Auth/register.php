<?php require 'App/bootstrap.php';

use App\Client;

$client = new Client([
    'url' => '/api/v1/register',
    'method' => "post",
    'options' => [
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



// $client::test();



// $client = new \GuzzleHttp\Client(["base_uri" => BASE_URL]);

// try {
//     $options = [
//         'form_params' => [
//             "name" => "psmever",
//             "email" => "psmever@gmail.com",
//             "password" => "123456",
//             "confirm_password" => "123456",
//         ],
//         'debug' => false,
//         // 'http_errors' => false
//     ];

//     $response = $client->post("/api/v1/register", $options);
//     $statusCode = $response->getStatusCode();

//     // echo $statusCode;
// } catch ( \GuzzleHttp\Exception\ClientException $e) {
//     echo ":::ClientException:::".PHP_EOL;

//     $response = $e->getResponse();
//     $responseBodyAsString = $response->getBody()->getContents();

//     print_r(json_decode($responseBodyAsString, true));

// } catch ( \GuzzleHttp\Exception\ServerException $e) {
//     echo ":::ServerException:::".PHP_EOL;

//     $response = $e->getResponse();
//     $responseBodyAsString = $response->getBody()->getContents();

//     print_r(json_decode($responseBodyAsString, true));

// } catch ( \GuzzleHttp\Exception\BadResponseException $e) {
//     echo ":::BadResponseException:::".PHP_EOL;

// }

echo PHP_EOL;
?>