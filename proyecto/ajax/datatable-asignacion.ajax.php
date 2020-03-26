<?php

require_once "../controladores/asignacion.controlador.php";
require_once "../modelos/asignacion.modelo.php";

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
/*
require_once "../controladores/cargos.controlador.php";
require_once "../modelos/cargos.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";*/

class TablaAsignacion{

 	/*=============================================
 	 MOSTRAR LA TABLA DE ASIGNACION
  	=============================================*/ 

	public function mostrarTablaAsignacion(){

		$item = null;
		$valor = null;
		
		

  		$solicitud = ControladorAsignaciones::ctrMostrarAsignaciones($item, $valor);	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($solicitud); $i++){

		
		  	/*=============================================
 	 		TRAEMOS USUARIO
  				=============================================*/ 

		  	$item = "nombre";
		  	$valor = $solicitud[$i]["usuario"];

			  $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
			  
	      	/*=============================================
 	 		TRAEMOS EL CARGO
  			

		  	$item = "id";
		  	$valor = $personal[$i]["cargo"];

			  $cargos = ControladorCargos::ctrMostrarCargos($item, $valor);

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarAsignacion' idAsignacion='".$solicitud[$i]["id"]."' data-toggle='modal' data-target='#modalEditarAsignacion'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarAsignacion' idAsignacion='".$solicitud[$i]["id"]."' usuario='".$solicitud[$i]["usuariof"]."'><i class='fa fa-times'></i></button></div>";  

		  	$datosJson .='[
	

				 
				 
				  "'.$solicitud[$i]["id"].'",
				  "'.$solicitud[$i]["equipo"].'",
				  "'.$usuario["usuario"].'",
				  "'.$solicitud[$i]["asignadoPor"].'",
				  "'.$solicitud[$i]["observacion"].'",
				  "'.$solicitud[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE ASIGNACION
=============================================*/ 
$activarAsignacion = new TablaAsignacion();
$activarAsignacion -> mostrarTablaAsignacion();

?>