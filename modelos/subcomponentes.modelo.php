<?php
require_once "conexion.php";
class ModeloSubcomponentes{
	/*Mostrar Subcompetencias*/
	static public function mdlMostrarSubComponentes($tabla, $item, $valor, $orden){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt = null;
	}

	/*Ingresar una subcomponentes*/
	static public function mdlIngresarSubComponente($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_modulo, codigo, descripcion, puntaje) VALUES (:id_modulo, :codigo, :descripcion, :puntaje)");
		$stmt->bindParam(":id_modulo", $datos["id_modulo"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":puntaje", $datos["puntaje"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt = null;
	}
	/*Editar subcomponentes*/
	static public function mdlEditarSubComponente($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_modulo = :id_modulo, descripcion = :descripcion, puntaje = :puntaje WHERE codigo = :codigo");
		$stmt->bindParam(":id_modulo", $datos["id_modulo"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":puntaje", $datos["puntaje"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt = null;
	}
	/*Borrar subcomponentes*/
	static public function mdlEliminarSubComponente($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt = null;
	}
	/*Actualizar subcomponentes*/

	static public function mdlActualizarSubComponente($tabla, $item1, $valor1, $valor){
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

}