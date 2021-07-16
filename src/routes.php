<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@home');
$router->get('/artigos', 'HomeController@artigos');
$router->get('/admin', 'HomeController@admin');
$router->get('/sobre', 'HomeController@sobre');
