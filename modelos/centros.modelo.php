<?php

require_once "conexion.php";

class ModeloCentros{
	/* Crear un Centro Regional */
	static public function mdlIngresarCentro($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(centro) VALUES (:centro)");
		$stmt->bindParam(":centro", $datos, PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		
		$stmt = null;
	}
	/* Mostrar Centros Regionales */
	static public function mdlMostrarCentros($tabla, $item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		
		$stmt = null;
	}
	/* Editar Centros Regionales */
	static public function mdlEditarCentro($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET centro = :centro WHERE id = :id");
		$stmt -> bindParam(":centro", $datos["centro"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		
		$stmt = null;
	}
    /* Borrar Centros Regionales */
	static public function mdlBorrarCentro($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		
		$stmt = null;
	}
}

