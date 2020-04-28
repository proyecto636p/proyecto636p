<?php

require_once "conexion.php";

class ModeloPersonal{

	/*=============================================
	CREAR PERSONAL
	=============================================*/

	static public function mdlIngresarPersonal($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id, cedula, nombres, apellidos, email, telefono, direccion, fecha_nac, cargo, departamento, estado) VALUES (null, :cedula, :nombres, :apellidos, :email, :telefono, :direccion, :fecha_nac, :cargo, :departamento, :estado)");

		$stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nac", $datos["fecha_nac"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
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
	MOSTRAR PERSONAL
	=============================================*/

	static public function mdlMostrarPersonals($tabla, $item, $valor){

		if($item == "id"){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}
		if($item == "cedula"){

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
	EDITAR PERSONAL
	=============================================*/

	static public function mdlEditarPersonal($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cedula = :cedula, nombres = :nombres, apellidos = :apellidos, email = :email, telefono = :telefono, direccion = :direccion, fecha_nac = :fecha_nac, cargo = :cargo, departamento = :departamento, estado = :estado WHERE cedula = :cedula");

		$stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_INT);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nac", $datos["fecha_nac"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_INT);
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_INT);
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
	ELIMINAR PERSONAL
	=============================================*/

	static public function mdlEliminarPersonal($tabla, $datos){

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