<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@home');
//$router->get('/sobre/{nome}', 'HomeController@sobreP');
//$router->get('/sobre', 'HomeController@sobre');