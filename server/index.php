<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;


/* cross origin http */
$app -> add(function ($req, $res, $next) {
    $response = $next($req, $res);

    return $response
        -> withHeader('Access-Control-Allow-Origin', 'http://127.0.0.1:5500')
        -> withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        -> withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
});



$app -> get('/item/{name}', function (Request $request, Response $response) {
    $name = $request -> getAttribute('name');

    $result = array(
        'name' => $name
    );

    $response -> getBody() -> write(json_encode($result, JSON_UNESCAPED_UNICODE));
    return $response;
});


$app -> post('/item', function (Request $request, Response $response) {
    $name = $request -> getParam('name');
    $price = $request -> getParam('price');

    $result = array(
        'name'  => $name,
        'price' => $price
    );

    $response -> getBody() -> write(json_encode($result, JSON_UNESCAPED_UNICODE));
    return $response;

});


$app -> put('/item/{name}', function (Request $request, Response $response) {
    $name = $request -> getAttribute('name');

    $price = $request -> getParam('price');

    $result = array(
        'name'  => $name,
        'price' => $price
    );

    $response -> getBody() -> write(json_encode($result, JSON_UNESCAPED_UNICODE));
    return $response;
    
});


$app -> delete('/item/{name}', function (Request $request, Response $response) {
    $name = $request -> getAttribute('name');

    $result = array(
        'name'  => $name
    );

    $response -> getBody() -> write(json_encode($result, JSON_UNESCAPED_UNICODE));
    return $response;
    
});


$app->run();