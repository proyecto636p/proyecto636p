<?php

require_once "../controladores/personal.controlador.php";
require_once "../modelos/personal.modelo.php";

require_once "../controladores/departamentos.controlador.php";
require_once "../modelos/departamentos.modelo.php";

require_once "../controladores/cargos.controlador.php";
require_once "../modelos/cargos.modelo.php";

/*require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";*/

class TablaPersonal{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PERSONAL
  	=============================================*/ 

	public function mostrarTablaPersonal(){

		$item = null;
    	$valor = null;

  		$personal = ControladorPersonals::ctrMostrarPersonals($item, $valor);	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($personal); $i++){

		
		  	/*=============================================
 	 		TRAEMOS DEPARTAMENTOS
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $personal[$i]["departamento"];

			  $departamentos = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);
			  
	    	/*=============================================
 	 		TRAEMOS EL CARGO
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $personal[$i]["cargo"];

			  $cargos = ControladorCargos::ctrMostrarCargos($item, $valor);

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarPersonal' idPersonal='".$personal[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPersonal'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPersonal' idPersonal='".$personal[$i]["id"]."' cedula='".$personal[$i]["cedula"]."'><i class='fa fa-times'></i></button></div>";  

		  	$datosJson .='[
				 
				 
				  "'.$personal[$i]["cedula"].'",
				  "'.$personal[$i]["nombres"].'",
				  "'.$personal[$i]["apellidos"].'",
				  "'.$personal[$i]["email"].'",
				  "'.$personal[$i]["telefono"].'",
				  "'.$personal[$i]["direccion"].'",
				  "'.$personal[$i]["fecha_nac"].'",
				  "'.$departamentos["descripcion"].'",
				  "'.$cargos["descripcion"].'",
				  "'.$personal[$i]["status"].'",
			      "'.$personal[$i]["fecha"].'",
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
ACTIVAR TABLA DE PERSONAL
=============================================*/ 
$activarProductos = new TablaPersonal();
$activarProductos -> mostrarTablaPersonal();

?>