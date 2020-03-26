<?php

require_once "../controladores/personal.controlador.php";
require_once "../modelos/personal.modelo.php";


class AjaxPersonal{
  
	/*=============================================
	EDITAR PERSONAL
	=============================================*/ 
  
	public $id;
  
	public function ajaxEditarPersonal(){
  
	  $item = "id";
	  $valor = $this->id;
  
	  $respuesta = ControladorPersonals::ctrMostrarPersonals($item, $valor);
  
	  echo json_encode($respuesta);
  
	}
  
  }

  /*=============================================
  EDITAR PERSONAL
  =============================================*/ 
  
  if(isset($_POST["id"])){
  
	$editarEquipo = new AjaxPersonal();
	$editarEquipo -> id = $_POST["id"];
	$editarEquipo -> ajaxEditarPersonal();
  
  }
  