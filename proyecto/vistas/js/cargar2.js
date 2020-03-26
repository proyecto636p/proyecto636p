$(document).ready(function(){

    
    /*=============================================
    categoria
    =============================================*/

    $.ajax({
        type: 'POST',
        url: 'vistas/js/combo.departamento.php',
        data: {'peticion': 'cargar_listas'}
    })
    .done(function(listas_rep){
      $('#nuevaDescripcion').html(listas_rep)
    })
    .fail(function(){
        alert("hubo un error al carga")
    })

    /*=============================================
    tipo
    =============================================*/
    $("#nuevaDescripcion").on("change", function(){

	var id = $("#nuevaDescripcion").val()
   $.ajax({
	type: 'POST',
	url: 'vistas/js/combo.cargo.php',
	data: {'id': id}
	}).done(function(lista){
		$('#nuevoCargo').html(lista)
	})
	.fail(function(){
			alert('Hubo un error al cargar')
	})

   })

})