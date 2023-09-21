<?php
require_once "conexion.php";
//session_start();
class ModeloSubcompetencias{
	/*Mostrar Pruebas*/
	static public function mdlMostrarSubcompetencias($tabla, $item, $valor, $orden){
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
	static public function mdlIngresarSubcompetencia($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_prueba, codigo, descripcion, fecha) VALUES (:id_prueba, :codigo, :descripcion, now())");
		$stmt->bindParam(":id_prueba", $datos["id_prueba"], PDO::PARAM_INT);
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
	static public function mdlEditarSubcompetencia($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_prueba = :id_prueba, descripcion = :descripcion WHERE codigo = :codigo");
		$stmt->bindParam(":id_prueba", $datos["id_prueba"], PDO::PARAM_INT);
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
	static public function mdlEliminarSubcompetencia($tabla, $datos){
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
	static public function mdlActualizarSubcompetencia($tabla, $item1, $valor1, $valor){
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

	static public function mdlFiltrarSubcompetencias($tabla, $item, $valor, $orden){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
}

}