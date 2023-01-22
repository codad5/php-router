<?php

require_once('middleware/test.php');
use codad5\examples\middleware\jwtT;
use Trulyao\PhpRouter\Router as Router;
use Trulyao\PhpRouter\HTTP\Response;

$jwt =  "hiigidhsd";
$router = new Router(__DIR__ . "/views", "examples", '/dynamic');


$router->run(function ($req, Response $res) {
    # A code for rate limiting
    if (!isset($_SESSION['rate_limit'])){
        $_SESSION['rate_limit'] = 0;
    }
    if($_SESSION['rate_limit'] >= 5)
    {
        return $res->send('rate limit exceeded');
    }
    $_SESSION['rate_limit'] = intval($_SESSION['rate_limit']) + 1;
    echo $_SESSION['rate_limit'];
});

$router->run(function($req, $res){
    //redirect if  logged in
    if(isset($_SESSION['is_login']))
    {
        return $res->redirect('/dashboard');
    }
});

/**
 * @desc [GET] Single dynamic route
 * @route /dynamic/
 */
$router->get('/', function ($req, $res) {
    $res->send('<a href="/dynamic/login">Login</a>')->status(200);
});

/**
 * @desc [GET] Single dynamic route
 * @route /dynamic/:id
 */
$router->get('/login', function ($req, $res) {
    $_SESSION['is_login'] = true;
    return $res->redirect('/dynamic');
});


/**
 * @desc [GET] Single dynamic route
 * @route /dynamic/:id
 */
$router->get('/:id', function ($req, $res) {
    return $res->send("<h1>Hello World</h1> </br> 
        Source: dynamic GET! </br> 
        Params(ID): {$req->params("id")}")->status(200);
});

/**
 * @desc [GET] Mixed dynamic route
 * @route /dynamic/:id/nested
 */
$router->get('/:id/nested', function ($req, $res) {
    return $res->send("<h1>Hello World</h1> </br> 
                Source: dynamic nested GET! </br> 
                Params(ID): {$req->params("id")} </br> 
                Path: {$req->path()}")->status(200);
});

/**
 * @desc [GET] Nested dynamic route
 * @route /dynamic/:id/:name
 */
$router->get('/:id/:name', function ($req, $res) {
    return $res->send("<h1>Hello World</h1> 
            </br> Source: dynamic nested GET! </br> 
            Param(ID): {$req->params("id")} </br> 
            Param(Name): {$req->params("name")}")->status(200);
});


$export = $router;