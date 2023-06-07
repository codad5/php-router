<?php

require_once('middleware/test.php');
use codad5\examples\middleware\jwtT;
use Codad5\PhpRouter\Router as Router;

$jwt =  "hiigidhsd";
$router = new Router(__DIR__ . "/views", "examples", '/dashboard');


$router->run(function($req, $res){
    //redirect if not logged in
    if(!isset($_SESSION['is_login']))
    {
        $res->redirect('/dynamic/login');
    }
});

/**
 * @desc [GET] Nested dynamic route
 * @route /dashboard/
 */
$router->get('/', function ($req, $res) {
    return $res->send("<h1>Hello World</h1> 
            </br> Source: dynamic nested GET! </br> 
            Param(ID): {$req->params("id")} </br> 
            Param(Name): {$req->params("name")}")->status(200);
});

/**
 * @desc [GET] Single dynamic route
 * @route /dashboard/emails
 */

$router->get('/emails', function ($req, $res) {
    return $res->send("<h1>Hello World</h1> </br> 
        Source: dynamic GET! </br> 
        Params(ID): {$req->params("id")}")->status(200);
});

/**
 * @desc [GET] Mixed dynamic route
 * @route /dashboard/customers
 */
$router->get('/customers', function ($req, $res) {
    return $res->send("<h1>Hello World</h1> </br> 
                Source: dynamic nested GET! </br> 
                Params(ID): {$req->params("id")} </br> 
                Path: {$req->path()}")->status(200);
});




return $router;