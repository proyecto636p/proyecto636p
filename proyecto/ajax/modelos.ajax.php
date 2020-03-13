<?php

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";

class AjaxModelos{

	/*=============================================
	EDITAR MODELOS
	=============================================*/	

	public $idModelo;

	public function ajaxEditarModelos(){

		$item = "id";
		$valor = $this->idModelo;

		$respuesta = ControladorModelo::ctrMostrarModelos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR MODELOS
=============================================*/	
if(isset($_POST["idModelo"])){

	$modelos = new AjaxModelos();
	$modelos -> idModelo = $_POST["idModelo"];
	$modelos -> ajaxEditarModelos();
}
