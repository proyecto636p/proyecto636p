<?php

class ControladorAsignacionesC{

	/*=============================================
	CREAR ASIGNACION
	=============================================*/

	static public function ctrCrearAsignacion(){

		if(isset($_POST["nuevaAsignacion"])){
		

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaAsignacion"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoUsuario"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsignadoPor"])){
	

				$tabla = "asignacionC";

				  
			   	$datos = array("asignacion"=>$_POST["nuevaAsignacion"],
					           "usuario"=>$_POST["nuevoUsuario"],
							   "asignadoPor"=>$_POST["nuevoAsignadoPor"],
							   "observacion"=>$_POST["nuevaObservacion"],
							   "asignado"=>$_POST["asignado"]);

			   	$respuesta = ModeloAsignacionesC::mdlIngresarAsignacion($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Asignacion ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "asignacionesC";

									}
								})

					</script>';

				}
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Asignacion no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "asignacionesC";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR ASIGNACIONES
	=============================================*/

	static public function ctrMostrarAsignaciones($item, $valor){

		$tabla = "asignacionC";

		$respuesta = ModeloAsignacionesC::mdlMostrarAsignaciones($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR ASIGNACION
	=============================================*/

	static public function ctrEditarAsignacion(){


		if(isset($_POST["editarAsignacion"])){

			/*echo'<script>alert('.$_POST["editarAsignacion"].')</script>';
			echo'<script>alert('.$_POST["editarUsuario"].')</script>';
			echo'<script>alert('.$_POST["editarAsignadoPor"].')</script>';
			echo'<script>alert('.$_POST["editarObservacion"].')</script>';
			echo'<script>alert('.$_POST["editarId"].')</script>';*/
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAsignacion"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarUsuario"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAsignadoPor"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarId"])){


			

		
			   	$tabla = "asignacionC";
								  
								  $datos = array("id"=>$_POST["editarId"],
								  "asignacion"=>$_POST["editarAsignacion"],
								  "usuario"=>$_POST["editarUsuario"],
								  "asignadopor"=>$_POST["editarAsignadoPor"],
								  "observacion"=>$_POST["editarObservacion"]);

			   	$respuesta = ModeloAsignacionesC::mdlEditarAsignacion($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Asignacion ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "asignacionesC";

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

						window.location = "asignacionesC";

						}
					})

			  </script>';
				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Asignacion no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "asignacionesC";

							}
						})

			  	</script>';



			}

		}


	}

	/*=============================================
	ELIMINAR ASIGNACION
	=============================================*/

	static public function ctrEliminarAsignacion(){

		if(isset($_GET["idAsignacion"])){

			$tabla ="asignacionC";
			$datos = $_GET["idAsignacion"];
			$codigo = $_GET["codigo"];

			$respuesta = ModeloAsignacionesC::mdlEliminarAsignacion($tabla, $datos, $codigo);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La Asignacion ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "asignacionesC";

								}
							})

				</script>';

			}		

		}

	}

}

