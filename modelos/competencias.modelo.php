<?php

require_once "conexion.php";

class ModeloCompetencias{
	/* Crear una Competencia */
	static public function mdlIngresarCompetencia($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(competencia) VALUES (:competencia)");
		$stmt->bindParam(":competencia", $datos, PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		
		$stmt = null;
	}
	/* Mostrar Competencias */
	static public function mdlMostrarCompetencias($tabla, $item, $valor){
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
	/* Editar Competencias */
	static public function mdlEditarCompetencia($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET competencia = :competencia WHERE id = :id");
		$stmt -> bindParam(":competencia", $datos["competencia"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		
		$stmt = null;
	}
    /* Borrar Competencias */
	static public function mdlBorrarCompetencia($tabla, $datos){
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

