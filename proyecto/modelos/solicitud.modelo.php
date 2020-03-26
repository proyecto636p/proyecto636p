<?php

require_once "conexion.php";

class ModeloSolicitudes{

	/*=============================================
	CREAR SOLICITUD
	=============================================*/

	static public function mdlIngresarSolicitud($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id, solicitud, usuariof, estado) VALUES (null, :solicitud, :usuariof, :estado)");

		$stmt->bindParam(":solicitud", $datos["solicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":usuariof", $datos["usuariof"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	MOSTRAR SOLICITUDES
	=============================================*/

	static public function mdlMostrarSolicitudes($tabla, $item, $valor){

		if($item == "id"){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR solicitud
	=============================================*/

	static public function mdlEditarSolicitud($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET solicitud = :solicitud, usuariof = :usuariof, estado = :estado WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":solicitud", $datos["solicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":usuariof", $datos["usuariof"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ELIMINAR solicitud
	=============================================*/

	static public function mdlEliminarSolicitud($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}
?>