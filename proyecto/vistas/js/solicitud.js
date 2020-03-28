/*=============================================
CARGAR LA TABLA DINÁMICA DE SOLICITUD
=============================================*/
$('.tablaSolicitud').DataTable( {
  
  "ajax": "ajax/datatable-solicitud.ajax.php",
  "deferRender": true,
"retrieve": true,
"processing": true,
 "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

}

} );

/*=============================================
CARGAR LA TABLA DINÁMICA DE SOLICITUD
=============================================*/
$('.tablaSolicitud2').DataTable( {
  
  "ajax": "ajax/datatable-solicitud2.ajax.php",
  "deferRender": true,
"retrieve": true,
"processing": true,
 "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

}

} );


/*=============================================
EDITAR SOLICITUD
=============================================*/

$(".tablaSolicitud2 tbody").on("click", "button.btnEditarSolicitud",function(){

var id = $(this).attr("idSolicitud");



  
var datos = new FormData();

  datos.append("id", id);

   $.ajax({

    url:"ajax/solicitud.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){
        
         $("#editarId").val(respuesta["id"]);


         $("#editarSolicitud").val(respuesta["solicitud"]);
         $("#editarEstado").val(respuesta["estado"]);


    }
})

})

/*=============================================
EDITAR SOLICITUD
=============================================*/

$(".tablaSolicitud tbody").on("click", "button.btnEditarSolicitud",function(){

  var id = $(this).attr("idSolicitud");
  
  
  
    
  var datos = new FormData();
  
    datos.append("id", id);
  
     $.ajax({
  
      url:"ajax/solicitud.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
          
           $("#editarId").val(respuesta["id"]);
  
  
           $("#editarSolicitud").val(respuesta["solicitud"]);
           $("#editarEstado").val(respuesta["estado"]);
  
  
      }
  })
  
  })

/*=============================================
ACTIVAR SOLICITUD
=============================================*/
$(".tablaSolicitud").on("click", ".btnActivar", function(){

	var idSolicitud = $(this).attr("idSolicitud");
	var estadoSolicitud = $(this).attr("estadoSolicitud");

	var datos = new FormData();
 	datos.append("activarId", idSolicitud);
  	datos.append("activarSolicitud", estadoSolicitud);

  	$.ajax({

	  url:"ajax/solicitud.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

	      	if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "la solicitud ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "solicitudes";

			        }


				});

	      	}

      }

  	})

  	if(estadoSolicitud == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('En Proceso');
  		$(this).attr('estadoSolicitud',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Procesada');
  		$(this).attr('estadoSolicitud',0);

  	}

})


/*=============================================
ELIMINAR SOLICITUD
=============================================*/

$(".tablaSolicitud2 tbody").on("click", "button.btnEliminarSolicitud", function(){

var idSolicitud = $(this).attr("idSolicitud");
var usuario = $(this).attr("usuario");

swal({

  title: '¿Está seguro de borrar la solicitud?',
  text: "¡Si no lo está puede cancelar la accíón!",
  type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar solicitud!'
      }).then(function(result){
      if (result.value) {

        window.location = "index.php?ruta=solicitudes&idSolicitud="+idSolicitud+"&usuario="+usuario;

      }


})
})

/*=============================================
ELIMINAR SOLICITUD
=============================================*/

$(".tablaSolicitud tbody").on("click", "button.btnEliminarSolicitud", function(){

  var idSolicitud = $(this).attr("idSolicitud");
  var usuario = $(this).attr("usuario");
  
  swal({
  
    title: '¿Está seguro de borrar la solicitud?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar solicitud!'
        }).then(function(result){
        if (result.value) {
  
          window.location = "index.php?ruta=solicitudes&idSolicitud="+idSolicitud+"&usuario="+usuario;
  
        }
  
  
  })

})

