<?php

require_once "../controladores/asignacion.controlador.php";
require_once "../modelos/asignacion.modelo.php";


class AjaxAsignacion{
  
	/*=============================================
	EDITAR ASIGNACION
	=============================================*/ 
  
	public $id;
  
	public function ajaxEditarAsignacion(){
  
	  $item = "id";
	  $valor = $this->id;
  
	  $respuesta = ControladorAsignaciones::ctrMostrarAsignaciones($item, $valor);
  
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
  