<?php

require_once "conexion.php";

class ModeloAsignaciones{

	/*=============================================
	CREAR ASIGNACION
	=============================================*/

	static public function mdlIngresarAsignacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id, equipo, usuario, asignadoPor, observacion) VALUES (null, :equipo, :usuario, :asignadoPor, :observacion)");

		$stmt->bindParam(":equipo", $datos["asignacion"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":asignadoPor", $datos["asignadoPor"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	MOSTRAR ASIGNACION
	=============================================*/

	static public function mdlMostrarAsignaciones($tabla, $item, $valor){

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
	EDITAR ASIGNACION
	=============================================*/

	static public function mdlEditarAsignacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET equipo = :equipo, usuario = :usuario, asignadoPor = :asignadopor, observacion = :observacion WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":equipo", $datos["asignacion"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":asignadopor", $datos["asignadopor"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ELIMINAR ASIGNACION
	=============================================*/

	static public function mdlEliminarAsignacion($tabla, $datos){

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