<?php

class ControladorSoporte{

	//MUESTRA LA SOLICITUD//

	static public function ctrMostrarSoporte($item, $valor){

		$tabla = "soporte";

		$respuesta = ModeloSoporte::mdlMostrarSoporte($tabla, $item, $valor);

		return $respuesta;
	
	}


	static public function ctrCrearSoporte(){

		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaFalla"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsunto"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDepart"])){

				$tabla = "soporte";

				$datos = array("id_usuario" => $_POST["idUser"],
					           "id_atiende" => $_POST["sopTec"],
					           "codigo" => $_POST["nuevoCodigo"],
					           "sop_departamento"=>$_POST["nuevoDepart"],
					           "tipo_falla"=>$_POST["nuevaFalla"],
					           "estatus"=>$_POST["nuevoEstatus"],
					           "asunto" => $_POST["nuevoAsunto"],
					           "solucion" => $_POST["nuevaSolucion"]);

				$respuesta = ModeloSoporte::mdlIngresarSoporte($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Solicitud enviada Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "soporte";

						}

					});
				

					</script>';


				}	


			}
		}
	}

	static public function ctrGestSoporte(){

		if(isset($_POST["gestSoporte"])){

			//Gestiona el soporte para ser atendido//
			$tabla = "soporte";


			$datos = array("id_atiende"=>$_POST["sopTec"],
						   "codigo"=>$_POST["gestSoporte"],
						   "sop_departamento"=>$_POST["nuevoDepart"],
						   "tipo_falla"=>$_POST["nuevaFalla"],
						   "estatus"=>$_POST["nuevoEstatus"],
						   "asunto"=>$_POST["nuevoAsunto"],
						   "solucion"=>$_POST["nuevaSolucion"]);


			$respuesta = ModeloSoporte::mdlGestSoporte($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "Solicitud Atendida Correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "gestionar";

								}
							})

				</script>';

			}

		}

	}

}