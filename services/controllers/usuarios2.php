<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


//Redenrizo a la pagina que deseo mostrar
$app->get('/usuarios2',function() use ($app)
{
   return $app['twig']->render('/usuarios2/usuarios.html');
});

/*
* Devolver lista de usuarios con acciones 
* El cual es llamado desde el js
*/
$app->get('/usuarios/listActions', function() use ($app){
	//Cargo data con la consulta
	$data = $app['db']->getAll('SELECT * FROM tusuarios');
	//Al rst le agrego cada accion
	foreach ($data as $k => &$v) {
        $v['actions'] = $app['twig']->render('usuarios2/usuarios_actions.html', $v);
    }
    //Devuelvo el objeto
    return $app->json($data);
});

//POST
$app->post('/usuario/add', function(Request $request) use ($app) 
{
	//Creo un nuevo objeto vacio de la tabla.
   	$user = $app['db']->dispense("tusuarios");
   	//Seteo la key=value
	$user->apellido = $request->get('apellido');
   	$user->nombre = $request->get('nombre');
   	$user->email = $request->get('email');

   //$user_id = $app['db']->store($user);
   	//Devuelvo la respuesta.
	try {
		$response['success'] = true;
		$response['message'] = $app['db']->store($user);
	} catch (Exception $e) {
		$response['success'] = false;
		$response['message'] = $e->getMessage();
	}
	return $app->json($response);
});