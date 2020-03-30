<?php

require_once "../controladores/modelosC.controlador.php";
require_once "../modelos/modelosC.modelo.php";

class AjaxModelos{

	/*=============================================
	EDITAR MODELOS
	=============================================*/	

	public $idModelo;

	public function ajaxEditarModelos(){

		$item = "id";
		$valor = $this->idModelo;

		$respuesta = ControladorModeloC::ctrMostrarModelos($item, $valor);

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
