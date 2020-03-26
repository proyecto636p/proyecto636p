<?php

class ControladorCargos{

	/*=============================================
	CREAR CARGO
	=============================================*/

	static public function ctrCrearCargo(){

		if(isset($_POST["nuevoCargo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCargo"])){

				$tabla = "cargos";

				$datos = array("descripcion" => $_POST["nuevoCargo"] ,
				"iddepartamentof" => $_POST["nuevoDepartamento"]) ;
				

				$respuesta = ModeloCargos::mdlIngresarCargo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cargo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cargos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Cargo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cargos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CARGO
	=============================================*/

	static public function ctrMostrarCargos($item, $valor){

		$tabla = "cargos";

		$respuesta = ModeloCargos::mdlMostrarCargos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CARGOS
	=============================================*/

	static public function ctrEditarCargo(){

		if(isset($_POST["editarCargo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCargo"])){

				$tabla = "cargos";

				$datos = array("descripcion"=>$_POST["editarCargo"],
							   "id"=>$_POST["id"]);

				$respuesta = ModeloCargos::mdlEditarCargo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Cargo ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cargos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Cargo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cargos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CARGO
	=============================================*/

	static public function ctrBorrarCargo(){

		if(isset($_GET["id"])){

			$tabla ="cargos";
			$datos = $_GET["id"];

			$respuesta = ModeloCargos::mdlBorrarCargo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El Cargo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cargos";

									}
								})

					</script>';
			}
		}
		
	}
}
