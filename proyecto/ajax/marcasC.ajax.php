<?php

require_once "../controladores/marcasC.controlador.php";
require_once "../modelos/marcasC.modelo.php";

class AjaxMarcas{

	/*=============================================
	EDITAR MARCA
	=============================================*/	

	public $idMarca;

	public function ajaxEditarMarca(){

		$item = "id";
		$valor = $this->idMarca;

		$respuesta = ControladorMarcasC::ctrMostrarMarcas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR MARCA
=============================================*/	
if(isset($_POST["id"])){

	$marca = new AjaxMarcas();
	$marca -> idMarca = $_POST["id"];
	$marca -> ajaxEditarMarca();
}
