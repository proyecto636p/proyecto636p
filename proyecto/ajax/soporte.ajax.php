<?php

require_once "../controladores/soporte.controlador.php";
require_once "../modelos/soporte.modelo.php";

class AjaxSoporte{

	//complemento ajax para la atencion//

	public $idGest;

	public function ajaxGestSoporte(){

		$item = "id";
		$valor = $this->idGest;

		$respuesta = ControladorSoporte::ctrMostrarSoporte($item, $valor);

		echo json_encode($respuesta);

	}
}

//complemento del ajax//
if(isset($_POST["idGest"])){

	$departamento = new AjaxSoporte();
	$departamento -> idGest = $_POST["idGest"];
	$departamento -> ajaxGestSoporte();
}