
//Al leer el documento
$(document).ready(function() {
  console.log('Load js');
  //Hookeo la clase actionDelete una funcion
  hookActions ();
});

function hookActions () {
  console.log('Hooking actions');
  $('#requestNew').on('click', function(e) {
    openModal(e,'New');
  });
  $('.requestEdit').on('click', function(e) {
    openModal(e,'Edit');
  });

  $('.actionDelete').on('click', function(e) {
    actionDelete(e);
  });
}

function openModal(e,action){
  console.log('Call modal');
  $('#myModalLabel').text(action + ' User');
  $('#userForm_ABM').modal() ;
  console.log('Hooking action SAVE request ' + action );
  $('#actionSave').on('click', function(e) {
    actionSave(e,action);
  }); 
}

function actionSave(e,action){
  console.log('Action SAVE');
  //Detengo cualquier accion boostrap.js
  e.preventDefault();
  //Controlo que camino debo tomar.
  if(action='New'){
    actionNew(e);
  }else if(action='Edit'){
    actionEdit(e);
  }

}


//AMB
function actionNew(e) {
  console.log('Action NEW')
  var $form = $(this);
  var $apellido = $form.find('#inputApellido');
  var $nombre = $form.find('#inputNombre');
  var $email = $form.find('#inputEmail');
  
  $.ajax({
    url: '/usuario/add/',
    method:'post',
    data: {
      apellido: $apellido.val(),
      nombre: $nombre.val(),
      email: $email.val()
    },
    success: function(response){
      console.log(response);
      //Oculto el formulario
      $('#userForm_ABM').modal('hide') ;
      //Recargo la pagina
      location.reload();
    }
  });

}

function actionEdit(e) {
}

function actionDelete(e) {
  console.log('Action DELETE')
  if( 'SPAN' === $(e.target).prop('tagName')) {
    id = $(e.target).parent().attr('id');
  } else {
    id = $(e.target).attr('id');
  }
  var msg = 'Desea usted eliminar el usuario ' + id;
  if (confirm(msg)) {
    console.log('Llamo el controlador')
    $.ajax({
      url: '/usuario/delete/'+id,
      method:'delete',
      success: function(response){
        console.log(response);
        location.reload();
      }
    });
  } 
} 
/*

$(document).ready(function() {
  conlose.log('Cargo el js2');
  $.ajax({
  url: '/get-usuarios',
  success: function(data){
    // var records = JSON.parse(data);
    $('#my-ajax-table').dynatable({
      dataset: {
        records: data
      }
    });
  }
});

});*/