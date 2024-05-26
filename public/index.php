<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello Slim!");
    return $response;
});

$app->get('/hello/kadi', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello Kadi!");
    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = ucfirst($args['name']);
    $response->getBody()->write(sprintf("Hello, %s!", $name));
    return $response;
});

$app->run();
