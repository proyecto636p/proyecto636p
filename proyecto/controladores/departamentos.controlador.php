<?php

class ControladorDepartamentos{

	/*=============================================
	CREAR DEPARTAMENTO
	=============================================*/

	static public function ctrCrearDepartamento(){

		if(isset($_POST["nuevoDepartamento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDepartamento"])){

				$tabla = "departamento";

				$datos = $_POST["nuevoDepartamento"];

				$respuesta = ModeloDepartamentos::mdlIngresarDepartamento($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El departamento ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "departamentos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El departamento no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "departamentos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR DEPARTAMENTOS
	=============================================*/

	static public function ctrMostrarDepartamentos($item, $valor){

		$tabla = "departamento";

		$respuesta = ModeloDepartamentos::mdlMostrarDepartamentos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR DEPARTAMENTOS
	=============================================*/

	static public function ctrEditarDepartamento(){

		if(isset($_POST["editarDepartamento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDepartamento"])){

				$tabla = "departamento";

				$datos = array("departamento"=>$_POST["editarDepartamento"],
							   "id"=>$_POST["idDepartamento"]);

				$respuesta = ModeloDepartamentos::mdlEditarDepartamento($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El departamento ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "departamentos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El departamento no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "departamentos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR DEPARTAMENTO
	=============================================*/

	static public function ctrBorrarDepartamento(){

		if(isset($_GET["idDepartamento"])){

			$tabla ="departamento";
			$datos = $_GET["idDepartamento"];

			$respuesta = ModeloDepartamentos::mdlBorrarDepartamento($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El departamento ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "departamentos";

									}
								})

					</script>';
			}
		}
		
	}
	
	
}
