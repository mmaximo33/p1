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

/**
 * Post
 * 
 */
$app->post('/usuarios', function(Request $request) use ($app) 
{
	$user = $app['db']->dispense('usuarios');

	$user->nombre = $request->get('nombre');
	$user->email = $request->get('email');
	//$user->id_perfil = $request->get('id_perfil');
	var_dump($user); die;
 	try {
 		$response['success'] = true;
 		$response['message'] = $app['db']->store($user);
 	} catch (Exception $e) {
 		$response['success'] = false;
 		$response['message'] = $e->getMessage();
 	}

 	return $app->json($response);
});
