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
  
  }

  /*=============================================
  EDITAR SOLICITUD
  =============================================*/ 
  
  if(isset($_POST["id"])){
  
	$editarSolicitud = new AjaxSolicitud();
	$editarSolicitud -> id = $_POST["id"];
	$editarSolicitud -> ajaxEditarSolicitud();
  
  }
  