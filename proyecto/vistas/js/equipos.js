/*=============================================
CARGAR LA TABLA DINÁMICA DE EQUIPOS
=============================================*/

// $.ajax({

// 	url: "ajax/datatable-productos.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

$('.tablaEquipos').DataTable( {
    "ajax": "ajax/datatable-equipos.ajax.php",
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
$("#nuevaCategoria").change(function(){

	var idCategoria = $(this).val();

	var datos = new FormData();
  	datos.append("idCategoria", idCategoria);

  	$.ajax({

      url:"ajax/equipos.ajax.php",
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

      		var nuevoCodigo = Number(respuesta["codigo"]+respuesta["id"]);
          	$("#nuevoCodigo").val(nuevoCodigo);

      	}
                
      }

  	})

})


/*=============================================
EDITAR EQUIPO
=============================================*/

$(".tablaEquipos tbody").on("click", "button.btnEditarEquipo",function(){

	var idEquipo = $(this).attr("idEquipo");
    

    
	var datos = new FormData();
    datos.append("idEquipo", idEquipo);

     $.ajax({

      url:"ajax/equipos.ajax.php",
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

              url:"ajax/categorias.ajax.php",
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
 
               url:"ajax/tipos.ajax.php",
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
 
               url:"ajax/marcas.ajax.php",
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

$(".tablaEquipos tbody").on("click", "button.btnEliminarEquipo", function(){

	var idEquipo = $(this).attr("idEquipo");
	var codigo = $(this).attr("codigo");
	
	swal({

		title: '¿Está seguro de borrar el Equipo?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar equipo!'
        }).then(function(result){
        if (result.value) {

        	window.location = "index.php?ruta=equipos&idEquipo="+idEquipo+"&codigo="+codigo;

        }


	})

})
	
