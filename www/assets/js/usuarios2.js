
$(document).ready(function(){
	console.log('Load JS');
	actionsDynaTable('CREATE');
});

//Create and refresh dynatable
function actionsDynaTable(type){
	//Create - Refresh
	console.log('entry actionsDynaTable action: ' + type);
	switch(type){
		case 'CREATE':
			//Creo el objeto
			myDynaTable = $('#users-table');	
			// bind dynatable event
			myDynaTable.bind('dynatable:afterUpdate', function(e, dynatable){
				//Hookeo las acciones de los buttons
				hookingActions();
			});

			// fill Table
			$.ajax({
			  url: '/usuarios/listActions', // Call getusuarios service on services/controllers/usuarios.php
				success: function(data) {
					dynatable = myDynaTable.dynatable({
						dataset: {
							records: data
						}
					}).data('dynatable');
				}
			});			
			break;
		case 'REFRESH':
			//refresco la tabla
			$.ajax({
			  url: '/usuarios/listActions', // Call getusuarios service on services/controllers/usuarios.php
				success: function(data) {
		            dynatable.records.updateFromJson({records: data});
		            dynatable.records.init();               
		            dynatable.process();  
				}
			});
			break;
	}
};

function hookingActions () {
  console.log('entry hookingActions');
  $('#requestAdd').on('click', function(e) {
    openModal(e,'ADD');
  });

  $('.requestEdit').on('click', function(e) {
    openModal(e,'EDIT');
  });

  $('.actionDelete').on('click', function(e) {
    actionDelete(e);
  });
}

function openModal(e,action){
	console.log('Call modal');
	$('#myModalLabel').text(action + ' User');
	$('#userForm_ABM').modal() ;
	/*Si es edit
	if (action='EDIT') {
		$.ajax({
			url: '/getusuario/'+id,
			success: function(response) {
				$name.val(response[0].name);
				$mail.val(response[0].mail);
			}
		});
	}*/
	$('#actionSave').on('click', function(e) {
		//Detengo cualquier accion boostrap.js
		e.preventDefault();
		actionSave(action);
	}); 
}

//Obtengo el ide que voy a utilizar
function getId(e) {
	console.log('entry getID');
	if( "SPAN" === $(e.target).prop("tagName")) {
		return $(e.target).parent().attr('id');
	} else {
		return $(e.target).attr('id');
	}
}

/*function actionSave(e,action){
  console.log('Action SAVE');
  //Detengo cualquier accion boostrap.js
  e.preventDefault();
  //Controlo que camino debo tomar.
  if(action='ADD'){
    actionNew(e);
  }else if(action='EDIT'){
    actionEdit(e);
  }
}*/

function actionSave(action){
	console.log('Hooking action SAVE request ' + action );

	//Seteo sus variables
	var $form = $('form#userForm_ABM');
	var $apellido = $form.find('#inputApellido').val();
	var $nombre = $form.find('#inputNombre').val();
	var $email = $form.find('#inputEmail').val();
	console.log($apellido + $email + $nombre);

	/*
	* If compacto
	* (action='EDIT') ? '/usuario/add' + id : '/usuario/add'
	*/
	console.log(action);
	if(action='EDIT'){
		/*var $method ='put';
		var $url = '/usuario/edit/' + getId() ;*/
		var $method ='post';
		var $url = '/usuario/add';
	}else{
		var $method ='post';
		var $url = '/usuario/add';
	}

	$.ajax({
		url: $url,
		method: $method,
		data: {
		apellido: $apellido,
		nombre: $nombre,
		email: $email
		},
		success: function(response){
			console.log(response);
			//Oculto el formulario
			$('#userForm_ABM').modal('hide') ;
			//Recargo la dynatable
			actionsDynaTable('REFRESH');
		},
		error: function(response) {
			console.log(response);
		},
		complete: function(response) {
			console.error(response);
		}
	});
}


//DELETE
function actionDelete(e) {
	console.log('Action DELETE')
	id = getId(e);
	var msg = 'Desea usted eliminar el usuario ' + id;
	if (confirm(msg)) {
		console.log('Llamo el controlador')
		$.ajax({
			url: '/usuario/delete/'+id,
			dataType: "json",
			method:'delete',
			success: function(response){
			console.log(response);
			actionsDynaTable('REFRESH');
		}
	});
	} 
} 