<?php
require_once "conexion.php";
//session_start();
class ModeloPruebas{
	/*Mostrar Pruebas*/
	static public function mdlMostrarPruebas($tabla, $item, $valor, $orden){
		//var_dump($item);
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
			//var_dump($stmt);
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt = null;
	}

	/*Ingresar una prueba*/
	static public function mdlIngresarPrueba($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_competencia, codigo, descripcion, fecha) VALUES (:id_competencia, :codigo, :descripcion, now())");
		$stmt->bindParam(":id_competencia", $datos["id_competencia"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt = null;
	}
	/*Editar prueba*/
	static public function mdlEditarPrueba($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_competencia = :id_competencia, descripcion = :descripcion WHERE codigo = :codigo");
		$stmt->bindParam(":id_competencia", $datos["id_competencia"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt = null;
	}
	/*Borrar prueba*/
	static public function mdlEliminarPrueba($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt = null;
	}

	/*Actualizar prueba*/
	static public function mdlActualizarPrueba($tabla, $item1, $valor1, $valor){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt = null;
	}

	static public function mdlFiltrarPruebas($tabla, $item, $valor, $orden){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
}

}