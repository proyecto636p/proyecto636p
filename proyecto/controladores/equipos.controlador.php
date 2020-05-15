<?php

class ControladorEquipos{

	/*=============================================
	MOSTRAR EQUIPOS
	=============================================*/

	static public function ctrMostrarEquipos($item, $valor){

		$tabla = "equipos";

		$respuesta = ModeloEquipos::mdlMostrarEquipos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR EQUIPO
	=============================================*/

	static public function ctrCrearEquipo(){

		if(isset($_POST["nuevaDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsignado"])){

		

		
		   		

				$tabla = "equipos";

				$datos = array("codigo" => $_POST["nuevoCodigo"],
							   "seriales" => $_POST["nuevoSerial"],
							   "categoria" => $_POST["nuevaCategoria"],
							   "tipo" => $_POST["nuevaDescripcion"],
							   "marca" => $_POST["nuevaMarca"],
							   "modelo" => $_POST["nuevaModelo"],
							   "estado" => $_POST["nuevoEstado"],
							   "stock" => $_POST["nuevoStock"],
							   "asignacion" => $_POST["nuevoAsignado"],
							   "observacion" => $_POST["nuevaObservacion"]);

				$respuesta = ModeloEquipos::mdlIngresarEquipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El equipo ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "equipos";

										}
									})

						</script>';

				}else{
					
				echo'<script>

				swal({
					  type: "error",
					  title: "¡no inserto los datos",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "equipos";

						}
					})

			  </script>';
				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El equipo no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "equipos";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	EDITAR EQUIPO
	=============================================*/

	static public function ctrEditarEquipo(){

		if(isset($_POST["editarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){

				$tabla = "equipos";

				$datos = array("codigo" => $_POST["editarCodigo"],
							   "seriales" => $_POST["editarSerial"],
							   "categoria" => $_POST["editarCategoria"],
							   "tipo" => $_POST["editarDescripcion"],
							   "marca" => $_POST["editarMarca"],
							   "modelo" => $_POST["editarModelo"],
							   "estado" => $_POST["editarEstado"],
							   "stock" => $_POST["editarStock"],
							   "asignacion" => $_POST["editarAsignado"],
							   "observacion" => $_POST["editarObservacion"]);

				$respuesta = ModeloEquipos::mdlEditarEquipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El equipo ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "equipos";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El equipo no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "equipos";

							}
						})

			  	</script>';
			}
		}

	}


	/*=============================================
	BORRAR EQUIPO
	=============================================*/
	static public function ctrEliminarEquipo(){

		if(isset($_GET["idEquipo"])){

			echo'<script>alert('.$_GET["asignado"].')</script>';

			if ($_GET["asignado"]=="no asignado") {
				

				$tabla ="equipos";
				$datos = $_GET["idEquipo"];
	
	
				$respuesta = ModeloEquipos::mdlEliminarEquipo($tabla, $datos);
	
				if($respuesta == "ok"){
	
					echo'<script>
	
					swal({
						  type: "success",
						  title: "El equipo ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
	
									window.location = "equipos";
	
									}
								})
	
					</script>';
	
				}	
			}else{
				
				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Equipo no puede estar Asignado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "equipos";

							}
						})

			  	</script>';
			}
			


		}

	}

}