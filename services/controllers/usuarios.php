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


//LIST
$app->get('/usuarios', function() use ($app) 
{
	//Guardo los datos obtenidos de la consulta
	$response['data']= $app['db']->getAll("SELECT * FROM t_usuarios");
   //Abro la lista de usuariso y le paso los datos
   	return $app['twig']->render('/usuarios/usuarios.html',$response);   
   	//return $app->json($response);	
});

//POST
$app->post('/usuario/add', function(Request $request) use ($app) 
{
	$user = $app['db']->dispense('usuarios');

	$user->apellido = $request->get('apellido');
   $user->nombre = $request->get('nombre');
   $user->email = $request->get('email');

   $user_id = $app['db']->store($user);

   try {
      $response['success'] = true;
      $response['message'] = $app['db']->store($user);
   } catch (Exception $e) {
 		$response['success'] = false;
 		$response['message'] = $e->getMessage();
 	}
 	return $app->json($response);
});

//DELETE
$app->delete('/usuario/delete/{id}', function($id) use ($app)
{
   $usuario = $app['db']->load('t_usuarios', $id);
   try {
      $response['success'] = true;
      $response['message'] = $app['db']->trash($usuario);
   } catch (Exception $e) {
      $response['success'] = false;
      $response['message'] = $e->getMessage();
   }
   return $app->json($response);
});


