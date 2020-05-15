<?php

require_once "../controladores/asignacionC.controlador.php";
require_once "../modelos/asignacionC.modelo.php";


class AjaxAsignacion{
  
	/*=============================================
	EDITAR ASIGNACION
	=============================================*/ 
  
	public $id;
  
	public function ajaxEditarAsignacion(){
  
	  $item = "id";
	  $valor = $this->id;
  
	  $respuesta = ControladorAsignacionesC::ctrMostrarAsignaciones($item, $valor);
  
	  echo json_encode($respuesta);
  
	}
  
  }

  /*=============================================
  EDITAR ASIGNACION
  =============================================*/ 
  
  if(isset($_POST["id"])){
  
	$editarAsignacion = new AjaxAsignacion();
	$editarAsignacion -> id = $_POST["id"];
	$editarAsignacion -> ajaxEditarAsignacion();
  
  }
  