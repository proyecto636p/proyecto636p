<?php

class ControladorTipos{

	/*=============================================
	CREAR TIPO
	=============================================*/

	static public function ctrCrearTipo(){

		if(isset($_POST["nuevoTipo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipo"])){

				$tabla = "tipos";

				$datos = array("descripcion" => $_POST["nuevoTipo"] ,
				               "idcategoriaf" => $_POST["nuevaCategoria"]) ;
				
				

				$respuesta = ModeloTipos::mdlIngresarTipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El tipo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR TIPO
	=============================================*/

	static public function ctrMostrarTipos($item, $valor){

		$tabla = "tipos";

		$respuesta = ModeloTipos::mdlMostrarTipos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR TIPO
	=============================================*/

	static public function ctrEditarTipo(){

		if(isset($_POST["editarTipo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipo"])){

				$tabla = "tipos";

				$datos = array("descripcion"=>$_POST["editarTipo"],
							   "id"=>$_POST["id"]);

				$respuesta = ModeloTipos::mdlEditarTipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Tipo ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El tipo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR TIPO
	=============================================*/

	static public function ctrBorrarTipo(){

		if(isset($_GET["id"])){

			$tabla ="tipos";
			$datos = $_GET["id"];

			$respuesta = ModeloTipos::mdlBorrarTipo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El Tipo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipos";

									}
								})

					</script>';
			}
		}
		
	}
}
