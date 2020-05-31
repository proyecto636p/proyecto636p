/*=============================================
EDITAR CARGO
=============================================*/
$(".tablas").on("click", ".btnEditarCargo", function(){

	var idCargo = $(this).attr("idCargo");

	var datos = new FormData();
	datos.append("id", idCargo);

	$.ajax({
		url: "ajax/cargos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarCargo").val(respuesta["descripcion"]);
     		$("#id").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR CARGO
=============================================*/
$(".tablas").on("click", ".btnEliminarCargo", function(){

	 var idCargo = $(this).attr("idCargo");
	

	 swal({
	 	title: '¿Está seguro de borrar El Cargo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar cargo!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=cargos&id="+idCargo;

	 	}

	 })

})