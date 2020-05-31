<?php

require_once "../controladores/solicitud.controlador.php";
require_once "../modelos/solicitud.modelo.php";


class AjaxSolicitud{
  
	/*=============================================
	EDITAR SOLICITUD
	=============================================*/ 
  
	public $id;
  
	public function ajaxEditarSolicitud(){
  
	  $item = "id";
	  $valor = $this->id;
  
	  $respuesta = ControladorSolicitudes::ctrMostrarSolicitudes($item, $valor);
  
	  echo json_encode($respuesta);
  
	}

		/*=============================================
	ACTIVAR SOLICITUD
	=============================================*/	

	public $activarSolicitud;
	public $activarId;


	public function ajaxActivarSolicitud(){

		$tabla = "solicitud";

		$item1 = "estado";
		$valor1 = $this->activarSolicitud;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloSolicitudes::mdlActualizarSolicitud($tabla, $item1, $valor1, $item2, $valor2);

	}
  
  }

  /*=============================================
  EDITAR SOLICITUD
  =============================================*/ 
  
  if(isset($_POST["id"])){
  
	$editarSolicitud = new AjaxSolicitud();
	$editarSolicitud -> id = $_POST["id"];
	$editarSolicitud -> ajaxEditarSolicitud();
  
  }
  

  /*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarSolicitud"])){

	$activarSolicitud = new AjaxSolicitud();
	$activarSolicitud -> activarSolicitud = $_POST["activarSolicitud"];
	$activarSolicitud -> activarId = $_POST["activarId"];
	$activarSolicitud -> ajaxActivarSolicitud();

}