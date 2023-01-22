<?php

require_once('middleware/test.php');
use codad5\examples\middleware\jwtT;
use Trulyao\PhpRouter\HTTP\Request;
use Trulyao\PhpRouter\HTTP\Response;
use Codad5\PhpInex\Import as Import;
use Trulyao\PhpRouter\Router as Router;

$jwt = new jwtT('helloworld');
$router = new Router(__DIR__ . "/views",  "examples", '/api');


$router->run([$jwt, 'verify']);

/**
 * @route /render
 */
$router->get('/', function ($req, $res) {
    return $res->send([
        'status' => 'ok',
        'message' => 'good day'
    ]);
});



$export = $router;