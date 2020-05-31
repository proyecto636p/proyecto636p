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

require_once "../modelos/conexion.php";

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
			  
			  $item22 ="categoria";
			  $valor11 = $equipos[$i]["categoria"];
	  
				$count = current(ControladorEquipos::ctrCountEquipos($item22, $valor11));


  			if($count <= 10){

  				$stock = "<button class='btn btn-danger'>".$count."</button>";

  			}else if($count > 11 && $count <= 15){

  				$stock = "<button class='btn btn-warning'>".$count."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$count."</button>";

			  }


		

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarEquipo' idEquipo='".$equipos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarEquipo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarEquipo' idEquipo='".$equipos[$i]["id"]."' codigo='".$equipos[$i]["codigo"]."' asignado='".$equipos[$i]["asignacion"]."'><i class='fa fa-times'></i></button></div>";  

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

