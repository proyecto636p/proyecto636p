<?php

require_once "../controladores/asignacion.controlador.php";
require_once "../modelos/asignacion.modelo.php";

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

require_once "../controladores/tipos.controlador.php";
require_once "../modelos/tipos.modelo.php";

require_once "../controladores/equipos.controlador.php";
require_once "../modelos/equipos.modelo.php";
/*
require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";*/

class TablaAsignacion{

 	/*=============================================
 	 MOSTRAR LA TABLA DE ASIGNACION
  	=============================================*/ 

	public function mostrarTablaAsignacion(){

		$item = null;
		$valor = null;
		
		

  		$asignacion = ControladorAsignaciones::ctrMostrarAsignaciones($item, $valor);	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($asignacion); $i++){


		    /*=============================================
 	 		TRAEMOS EQUIPO
				  =============================================*/ 
				  
				
				  $item = "codigo";
				  $valor = $asignacion[$i]["equipo"];
				  $equipo2 = ControladorEquipos::ctrMostrarEquipos($item, $valor);
	
  
				  $item = "id";
				  $valor = $equipo2["tipo"];
				  $equipo = ControladorTipos::ctrMostrarTipos($item, $valor);				  
				  
		
		  	/*=============================================
 	 		TRAEMOS USUARIO ASIGNADO
  				=============================================*/ 

		  	$item = "nombre";
		  	$valor = $asignacion[$i]["usuario"];

			  $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
			  

			  		  	/*=============================================
 	 		TRAEMOS USUARIO ASIGNADO POR
  				=============================================*/ 

				  $item = "nombre";
				  $valor = $asignacion[$i]["asignadoPor"];
	
				  $usuariopor = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
				  
	      	/*=============================================
 	 		TRAEMOS EL CARGO
  			

		  	$item = "id";
		  	$valor = $personal[$i]["cargo"];

			  $cargos = ControladorCargos::ctrMostrarCargos($item, $valor);

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarAsignacion' idAsignacion='".$asignacion[$i]["id"]."' data-toggle='modal' data-target='#modalEditarAsignacion'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarAsignacion' idAsignacion='".$asignacion[$i]["id"]."' codigo='".$asignacion[$i]["equipo"]."'><i class='fa fa-times'></i></button></div>";  

		  	$datosJson .='[
	

				 
				 
				  "'.$asignacion[$i]["id"].'",
				  "'.$equipo["descripcion"].'",
				  "'.$usuario["usuario"].'",
				  "'.$usuariopor["usuario"].'",
				  "'.$asignacion[$i]["observacion"].'",
				  "'.$asignacion[$i]["fecha"].'",
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