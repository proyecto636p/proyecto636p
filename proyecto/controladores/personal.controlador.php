<?php

class ControladorPersonals{

	/*=============================================
	CREAR PERSONAL
	=============================================*/

	static public function ctrCrearPersonal(){

		if(isset($_POST["nuevoNombres"])){


			if(

			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevaDireccion"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoStatus"])){

				   $tabla = "personal";




				  
			   	$datos = array("documento"=>$_POST["nuevoDocumentoId"],
					           "nombres"=>$_POST["nuevoNombres"],
					           "apellidos"=>$_POST["nuevoApellidos"],
					           "email"=>$_POST["nuevoEmail"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "direccion"=>$_POST["nuevaDireccion"],
							   "fecha_nac"=>$_POST["nuevaFechaNacimiento"],	
							   "cargo"=>$_POST["nuevoCargo"],					
							   "departamento"=>$_POST["nuevaDescripcion"],
							    "estatus"=>$_POST["nuevoStatus"]);

			   	$respuesta = ModeloPersonals::mdlIngresarPersonal($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Personal ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "personal";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Personal no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "personal";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR PERSONAL
	=============================================*/

	static public function ctrMostrarPersonals($item, $valor){

		$tabla = "personal";

		$respuesta = ModeloPersonals::mdlMostrarPersonals($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR PERSONAL
	=============================================*/

	static public function ctrEditarPersonal(){

		if(isset($_POST["editarNombres"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombres"])){

			   	$tabla = "personal";

				   $datos = array("id"=>$_POST["idPersonal"],
				                 "documento"=>$_POST["editarDocumentoId"],
								  "nombres"=>$_POST["editarNombres"],
								  "apellidos"=>$_POST["editarApellidos"],
					              "email"=>$_POST["editarEmail"],
					              "telefono"=>$_POST["editarTelefono"],
					              "direccion"=>$_POST["editarDireccion"],
								  "fecha_nac"=>$_POST["editarFechaNac"],
								  "cargo"=>$_POST["editarCargo"],
					              "departamento"=>$_POST["editarDepartamento"],
					              "estatus"=>$_POST["status"]);

			   	$respuesta = ModeloPersonals::mdlEditarPersonal($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El personal ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "personal";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Personal no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "personal";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR PERSONAL
	=============================================*/

	static public function ctrEliminarPersonal(){

		if(isset($_GET["idPersonal"])){

			$tabla ="personal";
			$datos = $_GET["idPersonal"];

			$respuesta = ModeloPersonals::mdlEliminarPersonal($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Personal ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "personal";

								}
							})

				</script>';

			}		

		}

	}

}

