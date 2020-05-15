/*=============================================
CARGAR LA TABLA DINÁMICA DE PERSONAL
=============================================*/

$('.tablaPersonal').DataTable( {
  "ajax": "ajax/datatable-personal.ajax.php",
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
EDITAR PERSONAL
=============================================*/

$(".tablaPersonal tbody").on("click", "button.btnEditarPersonal",function(){

var id = $(this).attr("idPersonal");



  
var datos = new FormData();

  datos.append("id", id);

   $.ajax({

    url:"ajax/personal.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){
        
         $("#editarCedula").val(respuesta["cedula"]);


         $("#editarNombres").val(respuesta["nombres"]);

         $("#editarApellidos").val(respuesta["apellidos"]);

         $("#editarEmail").val(respuesta["email"]);

         $("#editarTelefono").val(respuesta["telefono"]);

         $("#editarDireccion").val(respuesta["direccion"]);

         $("#editarFechaNac").val(respuesta["fecha_nac"]);

         var datosDepartamentos = new FormData();
         datosDepartamentos.append("idDepartamento",respuesta["departamento"]);

          $.ajax({

             url:"ajax/departamentos.ajax.php",
             method: "POST",
             data: datosDepartamentos,
             cache: false,
             contentType: false,
             processData: false,
             dataType:"json",
             success:function(respuesta){
                 
              $("#editarDepartamento").val(respuesta["id"]);
              $("#editarDepartamento").html(respuesta["descripcion"]);
                 
             }

         })

         var datosCargo = new FormData();
         datosCargo.append("id",respuesta["cargo"]);
 
          $.ajax({
 
             url:"ajax/cargos.ajax.php",
             method: "POST",
             data: datosCargo,
             cache: false,
             contentType: false,
             processData: false,
             dataType:"json",
             success:function(respuesta){
                 
                 $("#editarCargo").val(respuesta["id"]);
                 $("#editarCargo").html(respuesta["descripcion"]);
                 
             }
 
         })

         

         $("#editarEstado").val(respuesta["estado"]);
         $("#editarEstado").html(respuesta["estado"]);


    }

})

})
/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoDocumentoId").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/personal.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoDocumentoId").parent().after('<div class="alert alert-warning">Este personal ya existe en la base de datos</div>');

	    		$("#nuevoDocumentoId").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR PERSONAL
=============================================*/

$(".tablaPersonal tbody").on("click", "button.btnEliminarPersonal", function(){

var idPersonal = $(this).attr("idPersonal");
var cedula = $(this).attr("cedula");

swal({

  title: '¿Está seguro de borrar el Personal?',
  text: "¡Si no lo está puede cancelar la accíón!",
  type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Personal!'
      }).then(function(result){
      if (result.value) {

        window.location = "index.php?ruta=personal&idPersonal="+idPersonal+"&cedula="+cedula;

      }


})

})

