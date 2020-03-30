<?php

require_once "../controladores/consumibles.controlador.php";
require_once "../modelos/consumibles.modelo.php";

require_once "../controladores/categoriasC.controlador.php";
require_once "../modelos/categoriasC.modelo.php";

class AjaxConsumibles{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoConsumible(){

  	$item = "categoria";
  	$valor = $this->idCategoria;

  	$respuesta = ControladorConsumibles::ctrMostrarConsumibles($item, $valor);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR CONSUMIBLE
  =============================================*/ 

  public $idConsumible;

  public function ajaxEditarConsumible(){

    $item = "id";
    $valor = $this->idConsumible;

    $respuesta = ControladorConsumibles::ctrMostrarConsumibles($item, $valor);

    echo json_encode($respuesta);

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$codigoConsumible = new AjaxConsumibles();
	$codigoConsumible -> idCategoria = $_POST["idCategoria"];
	$codigoConsumible -> ajaxCrearCodigoConsumible();

}
/*=============================================
EDITAR CONSUMIBLE
=============================================*/ 

if(isset($_POST["idEquipo"])){

  $editarConsumible = new AjaxConsumibles();
  $editarConsumible -> idConsumible = $_POST["idEquipo"];
  $editarConsumible -> ajaxEditarConsumible();

}





