/*=============================================
EDITAR MARCA
=============================================*/
$(".tablas").on("click", ".btnEditarMarcaC", function(){

	var idTipo = $(this).attr("id");

	var datos = new FormData();
	datos.append("id", idTipo);

	$.ajax({
		url: "ajax/marcasC.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarMarca").val(respuesta["descripcion"]);
     		$("#id").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR MARCA
=============================================*/
$(".tablas").on("click", ".btnEliminarMarcaC", function(){

	 var idMarca = $(this).attr("id");

	 swal({
	 	title: '¿Está seguro de borrar la Marca?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Marca!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=marcasC&id="+idMarca;

	 	}

	 })

})