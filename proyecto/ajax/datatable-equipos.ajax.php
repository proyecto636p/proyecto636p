<?php

require_once "../controladores/equipos.controlador.php";
require_once "../modelos/equipos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/tipos.controlador.php";
require_once "../modelos/tipos.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";

class TablaEquipos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE EQUIPOS
  	=============================================*/ 

	public function mostrarTablaEquipos(){

		$item = null;
    	$valor = null;

  		$equipos = ControladorEquipos::ctrMostrarEquipos($item, $valor);	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($equipos); $i++){

		
		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $equipos[$i]["categoria"];

			  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
			  
	    	/*=============================================
 	 		TRAEMOS EL TIPO
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $equipos[$i]["tipo"];

			  $tipos = ControladorTipos::ctrMostrarTipos($item, $valor);


			/*=============================================
 	 		TRAEMOS EL MARCA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $equipos[$i]["marca"];

		  	$marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			if($equipos[$i]["stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$equipos[$i]["stock"]."</button>";

  			}else if($equipos[$i]["stock"] > 11 && $equipos[$i]["stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$equipos[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$equipos[$i]["stock"]."</button>";

  			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarEquipo' idEquipo='".$equipos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarEquipo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarEquipo' idEquipo='".$equipos[$i]["id"]."' codigo='".$equipos[$i]["codigo"]."'><i class='fa fa-times'></i></button></div>";  

		  	$datosJson .='[
				 
				 
				  "'.$equipos[$i]["codigo"].'",
				  "'.$equipos[$i]["seriales"].'",
				  "'.$categorias["categoria"].'",
				  "'.$tipos["descripcion"].'",
				  "'.$marcas["descripcion"].'",
				  "'.$equipos[$i]["modelo"].'",
				  "'.$equipos[$i]["estado"].'",
			      "'.$stock.'",
				  "'.$equipos[$i]["asignacion"].'",
			      "'.$equipos[$i]["fecha"].'",
				  "'.$equipos[$i]["observacion"].'",
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
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProductos = new TablaEquipos();
$activarProductos -> mostrarTablaEquipos();

