<?php

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";

class AjaxModelos{

	/*=============================================
	EDITAR MODELOS
	=============================================*/	

	public $idModelos;

	public function ajaxEditarModelos(){

		$item = "id";
		$valor = $this->idModelos;

		$respuesta = ControladorModelos::ctrMostrarModelos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR MODELOS
=============================================*/	
if(isset($_POST["idModelos"])){

	$modelos = new AjaxModelos();
	$modelos -> idModelos = $_POST["idModelos"];
	$modelos -> ajaxEditarModelos();
}
