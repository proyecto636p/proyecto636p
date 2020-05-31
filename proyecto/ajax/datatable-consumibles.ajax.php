<?php

require_once "../controladores/consumibles.controlador.php";
require_once "../modelos/consumibles.modelo.php";

require_once "../controladores/categoriasC.controlador.php";
require_once "../modelos/categoriasC.modelo.php";

require_once "../controladores/tiposC.controlador.php";
require_once "../modelos/tiposC.modelo.php";

require_once "../controladores/marcasC.controlador.php";
require_once "../modelos/marcasC.modelo.php";

require_once "../controladores/modelosC.controlador.php";
require_once "../modelos/modelosC.modelo.php";

class TablaConsumibles{

 	/*=============================================
 	 MOSTRAR LA TABLA DE CONSUMIBLES
  	=============================================*/ 

	public function mostrarTablaConsumibles(){

		$item = null;
    	$valor = null;

  		$equipos = ControladorConsumibles::ctrMostrarConsumibles($item, $valor);	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($equipos); $i++){

		
		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $equipos[$i]["categoria"];

			  $categorias = ControladorCategoriasC::ctrMostrarCategorias($item, $valor);
			  
	    	/*=============================================
 	 		TRAEMOS EL TIPO
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $equipos[$i]["tipo"];

			  $tipos = ControladorTiposC::ctrMostrarTipos($item, $valor);


			/*=============================================
 	 		TRAEMOS EL MARCA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $equipos[$i]["marca"];

		  	$marcas = ControladorMarcasC::ctrMostrarMarcas($item, $valor);

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

			  $item22 ="categoria";
			  $valor11 = $equipos[$i]["categoria"];
	  
				$count = current(ControladorConsumibles::ctrCountConsumibles($item22, $valor11));


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

		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarConsumible' idEquipo='".$equipos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarConsumible'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarConsumible' idEquipo='".$equipos[$i]["id"]."' codigo='".$equipos[$i]["codigo"]."' asignado='".$equipos[$i]["asignacion"]."'><i class='fa fa-times'></i></button></div>";  

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
$activarProductos = new TablaConsumibles();
$activarProductos -> mostrarTablaConsumibles();

