<?php

class ControladorTiposC{

	/*=============================================
	CREAR TIPO
	=============================================*/

	static public function ctrCrearTipo(){

		if(isset($_POST["nuevoTipo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipo"])){

				$tabla = "tiposC";

				$datos = array("descripcion" => $_POST["nuevoTipo"] ,
				               "idcategoriaf" => $_POST["nuevaCategoria"]) ;
				
				

				$respuesta = ModeloTiposC::mdlIngresarTipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tiposC";

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

							window.location = "tiposC";

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

		$tabla = "tiposC";

		$respuesta = ModeloTiposC::mdlMostrarTipos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR TIPO
	=============================================*/

	static public function ctrEditarTipo(){

		if(isset($_POST["editarTipo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipo"])){

				$tabla = "tiposC";

				$datos = array("descripcion"=>$_POST["editarTipo"],
							   "id"=>$_POST["id"]);

				$respuesta = ModeloTiposC::mdlEditarTipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Tipo ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tiposC";

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

							window.location = "tiposC";

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

			$tabla ="tiposC";
			$datos = $_GET["id"];

			$respuesta = ModeloTiposC::mdlBorrarTipo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El Tipo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tiposC";

									}
								})

					</script>';
			}
		}
		
	}
}
