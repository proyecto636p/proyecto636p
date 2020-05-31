<?php

class ControladorModeloC{

	/*=============================================
	CREAR MODELOS
	=============================================*/

	static public function ctrCrearModelo(){

		if(isset($_POST["nuevoModelo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoModelo"])){

				$tabla = "modelosc";

				
				$datos = array("descripcion" => $_POST["nuevoModelo"] ,
				               "idmarcaf" => $_POST["nuevaMarca"]) ;

				$respuesta = ModeloModelosC::mdlIngresarModelo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "e Modelo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "modeloC";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El modelo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "modeloC";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR MODELOS
	=============================================*/

	static public function ctrMostrarModelos($item, $valor){

		$tabla = "modelosc";

		$respuesta = ModeloModelosC::mdlMostrarModelos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR MODELO
	=============================================*/

	static public function ctrEditarModelo(){

		if(isset($_POST["editarModelo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarModelo"])){

				$tabla = "modelosc";

				$datos = array("modelo"=>$_POST["editarModelo"],
							   "id"=>$_POST["idModelo"]);

				$respuesta = ModeloModelosC::mdlEditarModelo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El modelo ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "modeloC";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El modelo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "modeloC";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR MODELOS
	=============================================*/

	static public function ctrBorrarModelo(){

		if(isset($_GET["idModelo"])){

			$tabla ="modelosc";
			$datos = $_GET["idModelo"];

			$respuesta = ModeloModelosC::mdlBorrarModelo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "el modelo ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "modeloC";

									}
								})

					</script>';
			}
		}
		
	}
}
