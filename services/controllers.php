<?php


require_once('controllers/usuarios.php');


$app->get('/', function() use ($app) 
{
 	return  'default asdasd controller';
});

$app->get('/info', function() use ($app) 
{
 	phpinfo();
});