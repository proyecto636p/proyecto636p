<?php

class ControladorConsumibles{

	/*=============================================
	MOSTRAR CONSUMIBLES
	=============================================*/

	static public function ctrMostrarConsumibles($item, $valor){

		$tabla = "consumibles";

		$respuesta = ModeloConsumibles::mdlMostrarConsumibles($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR CONSUMIBLE
	=============================================*/

	static public function ctrCrearConsumible(){

		if(isset($_POST["nuevaDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsignado"])){

		

		
		   		

				$tabla = "consumibles";

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

				$respuesta = ModeloConsumibles::mdlIngresarConsumible($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El Consumible ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "consumibles";

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

						window.location = "consumibles";

						}
					})

			  </script>';
				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Consumible no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "consumibles";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	EDITAR CONSUMIBLE
	=============================================*/

	static public function ctrEditarConsumible(){

		if(isset($_POST["editarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){

				$tabla = "consumibles";

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

				$respuesta = ModeloConsumibles::mdlEditarConsumible($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El Consumible ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "consumibles";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Consumible no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "consumibles";

							}
						})

			  	</script>';
			}
		}

	}


	/*=============================================
	BORRAR CONSUMIBLE
	=============================================*/
	static public function ctrEliminarConsumible(){

		if(isset($_GET["idEquipo"])){

			if ($_GET["asignado"]=="no asignado") {
				

				$tabla ="consumibles";
				$datos = $_GET["idEquipo"];
	
	
				$respuesta = ModeloConsumibles::mdlEliminarConsumible($tabla, $datos);
	
				if($respuesta == "ok"){
	
					echo'<script>
	
					swal({
						  type: "success",
						  title: "El Consumible ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
	
									window.location = "consumibles";
	
									}
								})
	
					</script>';
	
				}	
			}else{
				
				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Consumible no puede estar Asignado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "consumibles";

							}
						})

			  	</script>';
			}	
		}


	}

}