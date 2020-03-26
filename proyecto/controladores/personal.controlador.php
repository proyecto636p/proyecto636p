<?php

class ControladorPersonals{

	/*=============================================
	CREAR PERSONAL
	=============================================*/

	static public function ctrCrearPersonal(){

		if(isset($_POST["nuevoDocumentoId"])){
		

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombres"])&&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDireccion"])&&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEstado"])){

	

				$tabla = "personal";

				  
			   	$datos = array("cedula"=>$_POST["nuevoDocumentoId"],
					           "nombres"=>$_POST["nuevoNombres"],
					           "apellidos"=>$_POST["nuevoApellidos"],
					           "email"=>$_POST["nuevoEmail"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "direccion"=>$_POST["nuevaDireccion"],
							   "fecha_nac"=>$_POST["nuevaFechaNacimiento"],	
							   "cargo"=>$_POST["nuevoCargo"],					
							   "departamento"=>$_POST["nuevaDescripcion"],
							    "estado"=>$_POST["nuevoEstado"]);

			   	$respuesta = ModeloPersonal::mdlIngresarPersonal($tabla, $datos);

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

		$respuesta = ModeloPersonal::mdlMostrarPersonals($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR PERSONAL
	=============================================*/

	static public function ctrEditarPersonal(){

		if(isset($_POST["editarCedula"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCedula"])){

				/*echo'<script>alert('.$_POST["editarCedula"].')</script>';
				echo'<script>alert('.$_POST["editarNombres"].')</script>';
				echo'<script>alert('.$_POST["editarApellidos"].')</script>';
				echo'<script>alert('.$_POST["editarEmail"].')</script>';
				echo'<script>alert('.$_POST["editarTelefono"].')</script>';
				echo'<script>alert('.$_POST["editarDireccion"].')</script>';
				echo'<script>alert('.$_POST["editarFechaNac"].')</script>';
				echo'<script>alert('.$_POST["editarCargo"].')</script>';
				echo'<script>alert('.$_POST["editarDepartamento"].')</script>';
				echo'<script>alert('.$_POST["editarEstado"].')</script>';*/

			   	$tabla = "personal";
								  
								  $datos = array("cedula"=>$_POST["editarCedula"],
								  "nombres"=>$_POST["editarNombres"],
								  "apellidos"=>$_POST["editarApellidos"],
								  "email"=>$_POST["editarEmail"],
								  "telefono"=>$_POST["editarTelefono"],
								  "direccion"=>$_POST["editarDireccion"],
								  "fecha_nac"=>$_POST["editarFechaNac"],	
								  "cargo"=>$_POST["editarCargo"],					
								  "departamento"=>$_POST["editarDepartamento"],
								   "estado"=>$_POST["editarEstado"]);

			   	$respuesta = ModeloPersonal::mdlEditarPersonal($tabla, $datos);

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

				}else{
					
				echo'<script>

				swal({
					  type: "error",
					  title: "¡error!",
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

			$respuesta = ModeloPersonal::mdlEliminarPersonal($tabla, $datos);

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

