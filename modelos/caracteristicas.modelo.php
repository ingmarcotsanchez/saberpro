<?php

require_once "conexion.php";

class ModeloCaracteristicas{
	/* Mostrar Caracteristicas de aprendizaje */
    static public function mdlMostrarCaracteristicas($tabla, $item, $valor, $orden){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		//$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarVariasCaracteristicas($tabla, $item, $valor, $orden){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		//$stmt -> close();
		$stmt = null;
	}
	/* Crear Caracteristicas de aprendizaje */
	static public function mdlIngresarCaracteristica($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_prueba, puntaje_inicial, puntaje_final, nivel, caracteristica) VALUES (:id_prueba, :puntaje_inicial, :puntaje_final, :nivel, :caracteristica)");
		$stmt->bindParam(":id_prueba", $datos["id_prueba"], PDO::PARAM_INT);
		$stmt->bindParam(":puntaje_inicial", $datos["puntaje_inicial"], PDO::PARAM_STR);
		$stmt->bindParam(":puntaje_final", $datos["puntaje_final"], PDO::PARAM_STR);
		$stmt->bindParam(":nivel", $datos["nivel"], PDO::PARAM_STR);
        $stmt->bindParam(":caracteristica", $datos["caracteristica"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		//$stmt->close();
		$stmt = null;
	}
	/* Editar Caracteristicas de aprendizaje */
	static public function mdlEditarCaracteristica($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_prueba=:id_prueba, puntaje_inicial = :puntaje_inicial, puntaje_final = :puntaje_final, nivel = :nivel, caracteristica = :caracteristica WHERE id = :id");
		$stmt->bindParam(":id_prueba", $datos["id_prueba"], PDO::PARAM_INT);
		$stmt->bindParam(":puntaje_inicial", $datos["puntaje_inicial"], PDO::PARAM_INT);
		$stmt->bindParam(":puntaje_final", $datos["puntaje_final"], PDO::PARAM_INT);
		$stmt->bindParam(":nivel", $datos["nivel"], PDO::PARAM_STR);
        $stmt->bindParam(":caracteristica", $datos["caracteristica"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		//$stmt->close();
		$stmt = null;
	}
    /* Borrar Caracteristicas de aprendizaje */
	static public function mdlBorrarCaracteristica($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		//$stmt -> close();
		$stmt = null;
	}

	/*Actualizar modulo*/

	static public function mdlActualizarCaracteristica($tabla, $item1, $valor1, $valor){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		//$stmt -> close();
		$stmt = null;
	}
}

