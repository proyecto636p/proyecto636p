$(document).ready(function(){

    /*=============================================
    categoria
=============================================*/

    $.ajax({
        type: 'POST',
        url: 'vistas/js/combo.categorias.php',
        data: {'peticion': 'cargar_listas'}
    }).done(function(listas_rep){
      $('#nuevaCategoria').html(listas_rep)
    }).fail(function(){
        alert("hubo un error al carga")
    })

    /*=============================================
    tipo
=============================================*/
$("#nuevaCategoria").on("change", function(){

	var id = $("#nuevaCategoria").val()
$.ajax({
	type: 'POST',
	url: 'vistas/js/combo.tipos.php',
	data: {'id': id}
	}).done(function(lista){
		$('#nuevaDescripcion').html(lista)
	})
	.fail(function(){
			alert('Hubo un error al cargar')
	})

})


/*=============================================
marca
=============================================*/
$("#nuevaDescripcion").on("change", function(){

var id = $("#nuevaDescripcion").val()
$.ajax({
type: 'POST',
url: 'vistas/js/combo.marcas.php',
data: {'id': id}
}).done(function(lista){
    $('#nuevaMarca').html(lista)
})
.fail(function(){
        alert('Hubo un error al cargar')
})

})

/*=============================================
modelo
=============================================*/
$("#nuevaMarca").on("change", function(){

    var id = $("#nuevaMarca").val()
    $.ajax({
    type: 'POST',
    url: 'vistas/js/combo.modelos.php',
    data: {'id': id}
    }).done(function(lista){
        $('#nuevaModelo').html(lista)
    })
    .fail(function(){
            alert('Hubo un error al cargar')
    })
    
    })
})