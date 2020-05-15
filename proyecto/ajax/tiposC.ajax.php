<?php

require_once "../controladores/tiposC.controlador.php";
require_once "../modelos/tiposC.modelo.php";

class AjaxTipos{

	/*=============================================
	EDITAR TIPO
	=============================================*/	

	public $idTipo;

	public function ajaxEditarTipo(){

		$item = "id";
		$valor = $this->idTipo;

		$respuesta = ControladorTiposC::ctrMostrarTipos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR TIPO
=============================================*/	
if(isset($_POST["id"])){

	$tipo = new AjaxTipos();
	$tipo -> idTipo = $_POST["id"];
	$tipo -> ajaxEditarTipo();
}
