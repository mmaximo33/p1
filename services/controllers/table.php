<?php 

$app->get('/systemTables/{nameTable}', function($nameTable) use ($app) 
{
	switch ($nameTable){
		//Tabla de usuarios
		case 'usuarios':
		   $sql = "SELECT 
		   			idUsuario AS idUsuario,
		   			apellido AS apellido,
		   			nombre AS nombre,
		   			email AS email 
		   			FROM t_usuarios";
			break;
		case 'perfiles':
			$sql = "SELECT
						idPerfil AS id,
						Nombre AS nombre,
						Descripcion AS descipcion
					FROM t_perfiles";
			break;
	}
   	$data = $app['db']->getAll($sql);
 	return  $data;
});
