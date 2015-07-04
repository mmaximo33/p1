<?php

/**
 * Lista completa de los usuarios cargados.
 * 
 */
$app->get('/usuarios_todos', function() use ($app) 
{
   	//Abro la lista de usuariso y le paso los datos
   	return $app['twig']->render('/usuarios/usuarios.html');   	
});

$app->get('/get-usuarios', function() use ($app) 
{
   	$data = $app['db']->getAll("SELECT * FROM t_usuarios");
 	return  $app->json($data);
});


/**
 * TESTEP
 * 
 */
$app->get('/usuarios', function() use ($app) 
{
	//Guardo los datos obtenidos de la consulta
	$response['data']= $app['db']->getAll("SELECT * FROM t_usuarios");

   	//Abro la lista de usuariso y le paso los datos
   	return $app['twig']->render('/usuarios2/usuarios.html',$response);   	
});
