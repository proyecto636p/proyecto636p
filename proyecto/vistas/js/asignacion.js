/*=============================================
CARGAR LA TABLA DINÁMICA DE ASIGNACION
=============================================*/
$('.tablaAsignacion').DataTable( {
  
  "ajax": "ajax/datatable-asignacion.ajax.php",
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

$(".tablaAsignacion tbody").on("click", "button.btnEditarAsignacion",function(){

var id = $(this).attr("idAsignacion");

  
var datos = new FormData();

  datos.append("id", id);

   $.ajax({

    url:"ajax/asignacion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){

      
        
         $("#editarId").val(respuesta["id"]);
         $("#EQUIPO").val(respuesta["equipo"]);
         $("#USUARIO").val(respuesta["usuario"]);
         $("#OBSER").val(respuesta["observacion"]);
    



    }
})

   /*=============================================
    equipo
=============================================*/

$.ajax({
  type: 'POST',
  url: 'vistas/js/combo.equipos.php',
  data: {'peticion': 'cargar_listas'}
}).done(function(listas_rep){
$('#editarAsignacion').html(listas_rep)
}).fail(function(){
  alert("hubo un error al carga")
})

})


     /*=============================================
    equipo
=============================================*/

$.ajax({
  type: 'POST',
  url: 'vistas/js/combo.usuarios.php',
  data: {'peticion': 'cargar_listas'}
}).done(function(listas_rep){
$('#editarUsuario').html(listas_rep)
}).fail(function(){
  alert("hubo un error al carga")
})
/*=============================================
ELIMINAR SOLICITUD
=============================================*/

$(".tablaAsignacion tbody").on("click", "button.btnEliminarAsignacion", function(){

var idAsignacion = $(this).attr("idAsignacion");
var codigo = $(this).attr("codigo");

swal({

  title: '¿Está seguro de borrar la Asignacion?',
  text: "¡Si no lo está puede cancelar la accíón!",
  type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Asignacion!'
      }).then(function(result){
      if (result.value) {

        window.location = "index.php?ruta=asignaciones&idAsignacion="+idAsignacion+"&codigo="+codigo;

      }


})

})

