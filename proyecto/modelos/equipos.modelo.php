<?php

require_once "conexion.php";

class ModeloEquipos{

	/*=============================================
	MOSTRAR EQUIPOS
	=============================================*/

	static public function mdlMostrarEquipos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

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
	REGISTRO DE EQUIPO
	=============================================*/
	static public function mdlIngresarEquipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id, codigo, seriales, categoria, tipo, marca, modelo, estado, stock, asignacion, observacion) VALUES (null, :codigo, :seriales, :categoria, :tipo, :marca, :modelo, :estado, :stock, :asignacion, :observacion)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":seriales", $datos["seriales"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":asignacion", $datos["asignacion"], PDO::PARAM_STR);
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
	EDITAR EQUIPO
	=============================================*/
	static public function mdlEditarEquipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, seriales = :seriales, categoria = :categoria, tipo = :tipo, marca = :marca, modelo = :modelo, estado = :estado, stock = :stock, asignacion = :asignacion, observacion = :observacion WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":seriales", $datos["seriales"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_INT);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_INT);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
		$stmt->bindParam(":asignacion", $datos["asignacion"], PDO::PARAM_STR);
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
	BORRAR EQUIPO
	=============================================*/

	static public function mdlEliminarEquipo($tabla, $datos){

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