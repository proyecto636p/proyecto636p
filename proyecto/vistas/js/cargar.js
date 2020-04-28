$(document).ready(function(){

    /*=============================================
    categoria
=============================================*/

    $.ajax({
        type: 'POST',
        url: 'vistas/js/combo.categorias.php',
        data: {'peticion': 'cargar_listas'}
    }).done(function(listas_rep){
      $('#nuevaCategoriaE').html(listas_rep)
    }).fail(function(){
        alert("hubo un error al carga")
    })

    /*=============================================
    tipo
=============================================*/
$("#nuevaCategoriaE").on("change", function(){

	var id = $("#nuevaCategoriaE").val()
$.ajax({
	type: 'POST',
	url: 'vistas/js/combo.tipos.php',
	data: {'id': id}
	}).done(function(lista){
		$('#nuevaDescripcionE').html(lista)
	})
	.fail(function(){
			alert('Hubo un error al cargar')
	})

})


/*=============================================
marca
=============================================*/
$("#nuevaDescripcionE").on("change", function(){

var id = $("#nuevaDescripcionE").val()
$.ajax({
type: 'POST',
url: 'vistas/js/combo.marcas.php',
data: {'id': id}
}).done(function(lista){
    $('#nuevaMarcaE').html(lista)
})
.fail(function(){
        alert('Hubo un error al cargar')
})

})

/*=============================================
modelo
=============================================*/
$("#nuevaMarcaE").on("change", function(){

    var id = $("#nuevaMarcaE").val()
    $.ajax({
    type: 'POST',
    url: 'vistas/js/combo.modelos.php',
    data: {'id': id}
    }).done(function(lista){
        $('#nuevaModeloE').html(lista)
    })
    .fail(function(){
            alert('Hubo un error al cargar')
    })
    
    })

    /*++++++++++++++++++++++++++++++
     /*=============================================
    departamento
=============================================*/

$.ajax({
    type: 'POST',
    url: 'vistas/js/combo.departamento.php',
    data: {'peticion': 'cargar_listas'}
}).done(function(listas_rep){
  $('#nuevaDescripcion').html(listas_rep)
}).fail(function(){
    alert("hubo un error al carga")
})

/*=============================================
cargo
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



/*=============================================
cargo
=============================================*/
$("#nuevaCedula").on("change", function(){

var id = $("#nuevaCedula").val()
$.ajax({
type: 'POST',
url: 'vistas/js/combo.usuario.php',
data: {'id': id}
}).done(function(lista){
    $('#nuevoNombre').html(lista)
    $('#nuevoUsuario').html(id)
})
.fail(function(){
        alert('Hubo un error al cargar')
})

})

$("#nuevaCedula").on("change", function(){

    var id = $("#nuevaCedula").val()


        $('#nuevoUsuario').val(id)
  
    
    })

     /*=============================================
    equipo
=============================================*/

$.ajax({
    type: 'POST',
    url: 'vistas/js/combo.equipos.php',
    data: {'peticion': 'cargar_listas'}
}).done(function(listas_rep){
  $('#nuevaAsignacion').html(listas_rep)
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