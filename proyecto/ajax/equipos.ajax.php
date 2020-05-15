<?php

require_once "../controladores/equipos.controlador.php";
require_once "../modelos/equipos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxEquipos{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoEquipo(){

  	$item = "categoria";
  	$valor = $this->idCategoria;

  	$respuesta = ControladorEquipos::ctrMostrarEquipos($item, $valor);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR EQUIPO
  =============================================*/ 

  public $idEquipo;

  public function ajaxEditarEquipo(){

    $item = "id";
    $valor = $this->idEquipo;

    $respuesta = ControladorEquipos::ctrMostrarEquipos($item, $valor);

    echo json_encode($respuesta);

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$codigoEquipo = new AjaxEquipos();
	$codigoEquipo -> idCategoria = $_POST["idCategoria"];
	$codigoEquipo -> ajaxCrearCodigoEquipo();

}
/*=============================================
EDITAR EQUIPO
=============================================*/ 

if(isset($_POST["idEquipo"])){

  $editarEquipo = new AjaxEquipos();
  $editarEquipo -> idEquipo = $_POST["idEquipo"];
  $editarEquipo -> ajaxEditarEquipo();

}





