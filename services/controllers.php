<?php

require_once('controllers/table.php');
require_once('controllers/usuarios.php');
require_once('controllers/usuarios2.php');

$app->get('/', function() use ($app) 
{
	return $app->redirect('/usuarios');
 	return  'default asdasd controller';
});

$app->get('/info', function() use ($app) 
{
 	phpinfo();
});
