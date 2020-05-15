/*=============================================
EDITAR TIPO
=============================================*/
$(".tablas").on("click", ".btnEditarTipoC", function(){

	var idTipo = $(this).attr("id");

	var datos = new FormData();
	datos.append("id", idTipo);

	$.ajax({
		url: "ajax/tiposC.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarTipo").val(respuesta["descripcion"]);
     		$("#id").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR TIPO
=============================================*/
$(".tablas").on("click", ".btnEliminarTipoC", function(){

	 var idTipo = $(this).attr("id");

	 swal({
	 	title: '¿Está seguro de borrar el Tipo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Tipo!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=tiposC&id="+idTipo;

	 	}

	 })

})