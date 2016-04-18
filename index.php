<?php
require_once __DIR__ . '/vendor/autoload.php';

$uri      = 'http://localhost';
$email    = 'email@domain.com';
$password = 'myRealyCoolPassword';
$key      = 'suchKey';
$secret   = 'muchSecret';
$realm    = 'uselessparameterinthisimplementation';

$client = new \OpenX\OpenXClient(
    $uri, $email, $password, $key, $secret, $realm
);

// lets trigger a report request
$result = $client->get('/report/run?report=inv_rev&start_date=7&end_date=0&report_format=json');

if ($result->getStatusCode() == 200) {
    echo "Response: " . print_r(json_decode($result->getBody(), true), true) . "\n";
} else {;
    echo "Non-200 response:\ncode: " . $result->getStatusCode() . "\nmessage: " . $result->getStatusCode() . "\nbody: " . $result->getBody() . "\n";
}