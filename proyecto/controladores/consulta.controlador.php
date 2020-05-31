<?php 
	
	include_once("../modelos/consulta.modelo.php");

	$objeto = new Objeto;
	$crud = new CRUD;

	$cedula = $_POST['txtcedula'];
	$accion = $_POST['cmbAccion'];

	$objeto->cedula = $cedula;

	if ($accion == 'Consultar') {
		$resuldato = mysqli_fetch_assoc($crud->BuscarUsuarioPorClave($cedula));
		$mostrarResultado = '<p>' . $resuldato['nombre'] . ', ' . $resuldato['apellido'] . ', ' . $resuldato['cedula'] . ', ' . $resuldato['fecha'] . ', ' . $resuldato['tlf'] . ', ' . $resuldato['email'] . '</p>';

		echo $mostrarResultado;
	}

?>