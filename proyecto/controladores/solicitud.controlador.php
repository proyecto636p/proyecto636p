<?php

class ControladorSolicitudes{

	/*=============================================
	CREAR SOLICITUD
	=============================================*/

	static public function ctrCrearSolicitud(){

		if(isset($_POST["nuevaSolicitud"])){
		

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaSolicitud"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoUsuariof"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEstado"])){
	

				$tabla = "solicitud";

				  
			   	$datos = array("solicitud"=>$_POST["nuevaSolicitud"],
					           "usuariof"=>$_POST["nuevoUsuariof"],
					           "estado"=>$_POST["nuevoEstado"]);

			   	$respuesta = ModeloSolicitudes::mdlIngresarSolicitud($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Solicitud ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "solicitudes";

									}
								})

					</script>';

				}
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Solicitud no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "solicitudes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR SOLICITUDES
	=============================================*/

	static public function ctrMostrarSolicitudes($item, $valor){

		$tabla = "solicitud";

		$respuesta = ModeloSolicitudes::mdlMostrarSolicitudes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR solicitud
	=============================================*/

	static public function ctrEditarSolicitud(){

		if(isset($_POST["editarSolicitud"])){


			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarSolicitud"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarUsuariof"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEstado"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarId"])){


				/*echo'<script>alert('.$_POST["editarTelefono"].')</script>';
				echo'<script>alert('.$_POST["editarDireccion"].')</script>';
				echo'<script>alert('.$_POST["editarFechaNac"].')</script>';
				echo'<script>alert('.$_POST["editarCargo"].')</script>';
				echo'<script>alert('.$_POST["editarDepartamento"].')</script>';
				echo'<script>alert('.$_POST["editarEstado"].')</script>';*/

			   	$tabla = "solicitud";
								  
								  $datos = array("id"=>$_POST["editarId"],
								  "solicitud"=>$_POST["editarSolicitud"],
								  "usuariof"=>$_POST["editarUsuariof"],
								  "estado"=>$_POST["editarEstado"]);

			   	$respuesta = ModeloSolicitudes::mdlEditarSolicitud($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Solicitud ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "solicitudes";

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

						window.location = "solicitudes";

						}
					})

			  </script>';
				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Solicitud no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "solicitudes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR SOLICITUD
	=============================================*/

	static public function ctrEliminarSolicitud(){

		if(isset($_GET["idSolicitud"])){

			$tabla ="solicitud";
			$datos = $_GET["idSolicitud"];

			$respuesta = ModeloSolicitudes::mdlEliminarSolicitud($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La Solicitud ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "solicitudes";

								}
							})

				</script>';

			}		

		}

	}

}

