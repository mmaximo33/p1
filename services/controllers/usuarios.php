<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;




//LIST
$app->get('/usuarios', function() use ($app) 
{
	//Guardo los datos obtenidos de la consulta
	$response['data']= $app['db']->getAll("SELECT * FROM tusuarios");
   //Abro la lista de usuariso y le paso los datos
   	return $app['twig']->render('/usuarios/usuarios.html',$response);   
   	//return $app->json($response);	
});

//POST
$app->post('/usuario/add', function(Request $request) use ($app) 
{
   $user = $app['db']->dispense("tusuarios");

	$user->apellido = $request->get('apellido');
   $user->nombre = $request->get('nombre');
   $user->email = $request->get('email');

   //$user_id = $app['db']->store($user);

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
   $usuario = $app['db']->load('tusuarios', $id);
   try {
      $response['success'] = true;
      $response['message'] = $app['db']->trash($usuario);
   } catch (Exception $e) {
      $response['success'] = false;
      $response['message'] = $e->getMessage();
   }
   return $app->json($response);
});

