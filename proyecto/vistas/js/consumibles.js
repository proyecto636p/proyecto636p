$('.tablaConsumibles').DataTable( {
    "ajax": "ajax/datatable-consumibles.ajax.php",
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
CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
=============================================*/
$("#nuevaCategoriaC").change(function(){

	var idCategoria = $(this).val();

	var datos = new FormData();
  	datos.append("idCategoria", idCategoria);

  	$.ajax({

      url:"ajax/consumibles.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	if(!respuesta){

      		var nuevoCodigo = idCategoria+"01";
      		$("#nuevoCodigo").val(nuevoCodigo);

      	}else{

      		var nuevoCodigo = Number(respuesta["codigo"])+1;
          	$("#nuevoCodigo").val(nuevoCodigo);

      	}
                
      }

  	})

})


/*=============================================
EDITAR EQUIPO
=============================================*/

$(".tablaConsumibles tbody").on("click", "button.btnEditarConsumible",function(){

	var idEquipo = $(this).attr("idEquipo");
    

    
	var datos = new FormData();
    datos.append("idEquipo", idEquipo);

     $.ajax({

      url:"ajax/consumibles.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
          
          var datosCategoria = new FormData();
          datosCategoria.append("idCategoria",respuesta["categoria"]);

           $.ajax({

              url:"ajax/categoriasC.ajax.php",
              method: "POST",
              data: datosCategoria,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarCategoria").val(respuesta["id"]);
                  $("#editarCategoria").html(respuesta["categoria"]);
                  
              }

          })

           $("#editarCodigo").val(respuesta["codigo"]);

           var datosTipo = new FormData();
           datosTipo.append("id",respuesta["tipo"]);
 
            $.ajax({
 
               url:"ajax/tiposC.ajax.php",
               method: "POST",
               data: datosTipo,
               cache: false,
               contentType: false,
               processData: false,
               dataType:"json",
               success:function(respuesta){
                   
                $("#editarDescripcion").val(respuesta["id"]);
                   $("#editarDescripcion").html(respuesta["descripcion"]);
                   
               }
 
           })

           var datosMarca = new FormData();
           datosMarca.append("id",respuesta["marca"]);
 
            $.ajax({
 
               url:"ajax/marcasC.ajax.php",
               method: "POST",
               data: datosMarca,
               cache: false,
               contentType: false,
               processData: false,
               dataType:"json",
               success:function(respuesta){
                   
                $("#editarMarca").val(respuesta["id"]);
                $("#editarMarca").html(respuesta["descripcion"]);
                   
               }
 
           })
  
           $("#editarModelo").html(respuesta["modelo"]);


           $("#editarAsignado").val(respuesta["asignacion"]);
           $("#editarAsignado").html(respuesta["asignacion"]);

           $("#editarEstado").val(respuesta["estado"]);

           $("#editarSerial").val(respuesta["seriales"]);

           $("#editarStock").val(respuesta["stock"]);

           $("#editarObservacion").val(respuesta["observacion"]);


      }

  })

})

/*=============================================
ELIMINAR EQUIPO
=============================================*/

$(".tablaConsumibles tbody").on("click", "button.btnEliminarConsumible", function(){

	var idEquipo = $(this).attr("idEquipo");
    var codigo = $(this).attr("codigo");
    var asignado = $(this).attr("asignado");
	
	swal({

		title: '¿Está seguro de borrar el Consumible?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar consumible!'
        }).then(function(result){
        if (result.value) {

        	window.location = "index.php?ruta=consumibles&idEquipo="+idEquipo+"&codigo="+codigo+"&asignado="+asignado;

        }


	})

})
	
