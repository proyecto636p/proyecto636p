$(document).ready(function(){

    /*=============================================
    categoria
=============================================*/

    $.ajax({
        type: 'POST',
        url: 'vistas/js/combo.categoriasC.php',
        data: {'peticion': 'cargar_listas'}
    }).done(function(listas_rep){
      $('#nuevaCategoriaC').html(listas_rep)
    }).fail(function(){
        alert("hubo un error al carga")
    })

    /*=============================================
    tipo
=============================================*/
$("#nuevaCategoriaC").on("change", function(){

	var id = $("#nuevaCategoriaC").val()
$.ajax({
	type: 'POST',
	url: 'vistas/js/combo.tiposC.php',
	data: {'id': id}
	}).done(function(lista){
		$('#nuevaDescripcionC').html(lista)
	})
	.fail(function(){
			alert('Hubo un error al cargar')
	})

})


/*=============================================
marca
=============================================*/
$("#nuevaDescripcionC").on("change", function(){

var id = $("#nuevaDescripcionC").val()
$.ajax({
type: 'POST',
url: 'vistas/js/combo.marcasC.php',
data: {'id': id}
}).done(function(lista){
    $('#nuevaMarcaC').html(lista)
})
.fail(function(){
        alert('Hubo un error al cargar')
})

})

/*=============================================
modelo
=============================================*/
$("#nuevaMarcaC").on("change", function(){

    var id = $("#nuevaMarcaC").val()
    $.ajax({
    type: 'POST',
    url: 'vistas/js/combo.modelosC.php',
    data: {'id': id}
    }).done(function(lista){
        $('#nuevaModeloC').html(lista)
    })
    .fail(function(){
            alert('Hubo un error al cargar')
    })
    
    })

    /*=============================================
    equipo
=============================================*/

$.ajax({
    type: 'POST',
    url: 'vistas/js/combo.consumibles.php',
    data: {'peticion': 'cargar_listas'}
}).done(function(listas_rep){
  $('#nuevaAsignacionC').html(listas_rep)
}).fail(function(){
    alert("hubo un error al carga")
})

     /*=============================================
    equipo
=============================================*/

$.ajax({
    type: 'POST',
    url: 'vistas/js/combo.usuarios.php',
    data: {'peticion': 'cargar_listas'}
}).done(function(listas_rep){
  $('#nuevoUsuario').html(listas_rep)
}).fail(function(){
    alert("hubo un error al carga")
})

})