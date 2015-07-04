<?php

/**
 * Get
 * 
 */
$app->get('/usuarios', function() use ($app) 
{
	//Guardo los datos obtenidos de la consulta
	$response['data']= $app['db']->getAll("SELECT * FROM t_usuarios");

   	//Abro la lista de usuariso y le paso los datos
   	return $app['twig']->render('/usuarios/usuarios_lista.html',$response);   	
});

