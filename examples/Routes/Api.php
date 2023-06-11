<?php

require_once('middleware/test.php');
use codad5\examples\middleware\jwtT;
use Codad5\PhpRouter\HTTP\Request;
use Codad5\PhpRouter\HTTP\Response;
use Codad5\PhpInex\Import as Import;
use Codad5\PhpRouter\Router as Router;

$jwt = new jwtT('helloworld');
$router = new Router(__DIR__ . "/views",'/api');


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