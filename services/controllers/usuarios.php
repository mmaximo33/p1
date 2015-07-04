<?php

/**
 * Get
 * 
 */
$app->get('/usuarios', function() use ($app) 
{
	$dataUsuarios= $app['db']->getAll("SELECT * FROM t_usuarios");

   	// seteando parametros para la vista
   	// renderisamos
   	//return  'dusuarios';
   	return $app['twig']->render('/usuarios/usuarios_lista.html');   	
});

