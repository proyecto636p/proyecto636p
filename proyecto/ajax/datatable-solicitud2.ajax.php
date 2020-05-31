<?php


session_start();

require_once "../controladores/solicitud.controlador.php";
require_once "../modelos/solicitud.modelo.php";

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
/*
require_once "../controladores/cargos.controlador.php";
require_once "../modelos/cargos.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";*/

class TablaSolicitud{

 	/*=============================================
 	 MOSTRAR LA TABLA DE SOLICITUD
  	=============================================*/ 

	public function mostrarTablaSolicitud(){

	

		$item1 = "usuariof";
		$valor1 = $_SESSION["nombre"];
		

  		$solicitud = ControladorSolicitudes::ctrMostrarSolicitudes($item1, $valor1);	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($solicitud); $i++){

		
		  	/*=============================================
 	 		TRAEMOS USUARIO
  				=============================================*/ 

		  	$item = "nombre";
		  	$valor = $solicitud[$i]["usuariof"];

			  $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

			

			  if($solicitud[$i]["estado"] != 0){

				$botones2 =  "<button class='btn btn-success btn-xs btn-xs ' idSolicitud='".$solicitud[$i]["id"]."' estadoSolicitud='0'>Procesada</button>";  

	    	  }else{

		     	$botones2 =  "<button class='btn btn-danger btn-xs ' idSolicitud='".$solicitud[$i]["id"]."' estadoSolicitud='1'>En Proceso</button";  

			 } 

			  
	      	/*=============================================
 	 		TRAEMOS EL CARGO
  			

		  	$item = "id";
		  	$valor = $personal[$i]["cargo"];

			  $cargos = ControladorCargos::ctrMostrarCargos($item, $valor);


		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
			  =============================================*/ 

		    	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarSolicitud' idSolicitud='".$solicitud[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSolicitud'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSolicitud' idSolicitud='".$solicitud[$i]["id"]."' usuario='".$solicitud[$i]["usuariof"]."'><i class='fa fa-times'></i></button></div>";  
		  	     $datosJson .='[
	 
				      "'.$solicitud[$i]["id"].'",
				      "'.$solicitud[$i]["solicitud"].'",
				      "'.$usuario["usuario"].'",
				      "'.$botones2.'",
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
ACTIVAR TABLA DE SOLICITUD
=============================================*/ 
$activarProductos = new TablaSolicitud();
$activarProductos -> mostrarTablaSolicitud();

?>