<?php

require_once "conexion.php";

class ModeloSoporte{


	static public function mdlMostrarSoporte($tabla, $item, $valor){

		if($item == "codigo"){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}elseif($item =="id_usuario"){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		elseif($item =="id"){

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

	static public function mdlIngresarSoporte($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, id_usuario, sop_departamento, tipo_falla, asunto, estatus, id_atiende, solucion) VALUES (:codigo, :id_usuario, :sop_departamento, :tipo_falla, :asunto, :estatus, :id_atiende, :solucion)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":sop_departamento", $datos["sop_departamento"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo_falla", $datos["tipo_falla"], PDO::PARAM_STR);
		$stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);
		$stmt->bindParam(":solucion", $datos["solucion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_atiende", $datos["id_atiende"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlGestSoporte($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_atiende = :id_atiende, sop_departamento = :sop_departamento, tipo_falla = :tipo_falla, estatus = :estatus, asunto= :asunto, solucion = :solucion WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_atiende", $datos["id_atiende"], PDO::PARAM_INT);
		$stmt->bindParam(":sop_departamento", $datos["sop_departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_falla", $datos["tipo_falla"], PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);
		$stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
		$stmt->bindParam(":solucion", $datos["solucion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

}