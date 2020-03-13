/*=============================================
EDITAR MARCA
=============================================*/
$(".tablas").on("click", ".btnEditarMarca", function(){

	var idTipo = $(this).attr("id");

	var datos = new FormData();
	datos.append("id", idTipo);

	$.ajax({
		url: "ajax/marcas.ajax.php",
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
$(".tablas").on("click", ".btnEliminarMarca", function(){

	 var idMarca = $(this).attr("id");

	 swal({
	 	title: '¿Está seguro de borrar la marca?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar marca!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=marcas&id="+idMarca;

	 	}

	 })

})