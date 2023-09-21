<?php

require_once "conexion.php";

class ModeloResultados{
	/* Crear un Resultado Global */
	static public function mdlIngresarResultado($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(puntaje_programa, puntaje_referencia, puntaje_diferencia, desviacion_programa, desviacion_referencia, desviacion_diferencia, id_programa, anno) VALUES (:puntaje_programa, :puntaje_referencia, :puntaje_diferencia, :desviacion_programa, :desviacion_referencia, :desviacion_diferencia, {$_SESSION['id_programa']}, :anno)");
		$stmt->bindParam(":puntaje_programa", $datos["puntaje_programa"], PDO::PARAM_STR);
		$stmt->bindParam(":puntaje_referencia", $datos["puntaje_referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":puntaje_diferencia", $datos["puntaje_diferencia"], PDO::PARAM_STR);
		$stmt->bindParam(":desviacion_programa", $datos["desviacion_programa"], PDO::PARAM_STR);
		$stmt->bindParam(":desviacion_referencia", $datos["desviacion_referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":desviacion_diferencia", $datos["desviacion_diferencia"], PDO::PARAM_STR);
		$stmt->bindParam(":anno", $datos["anno"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
	
		$stmt = null;
	}
	
	/* Mostrar Resultado Global */
	static public function mdlMostrarResultados($tabla, $item, $valor){
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
	/* Editar Resultado Global */
	static public function mdlEditarResultado($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET puntaje_programa = :puntaje_programa, puntaje_referencia = :puntaje_referencia, puntaje_diferencia = :puntaje_diferencia, desviacion_programa = :desviacion_programa, desviacion_referencia = :desviacion_referencia, desviacion_diferencia = :desviacion_diferencia, anno = :anno WHERE id = :id");
		$stmt->bindParam(":puntaje_programa", $datos["puntaje_programa"], PDO::PARAM_STR);
		$stmt->bindParam(":puntaje_referencia", $datos["puntaje_referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":puntaje_diferencia", $datos["puntaje_diferencia"], PDO::PARAM_STR);
		$stmt->bindParam(":desviacion_programa", $datos["desviacion_programa"], PDO::PARAM_STR);
		$stmt->bindParam(":desviacion_referencia", $datos["desviacion_referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":desviacion_diferencia", $datos["desviacion_diferencia"], PDO::PARAM_STR);
		$stmt->bindParam(":anno", $datos["anno"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		
		$stmt = null;
	}
    /* Borrar Resultado Global */
	static public function mdlBorrarResultado($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
	
		$stmt = null;
	}

	/*Graficas*/
	static public function mdlGraficaResultadosPuntaje($tabla){
		if($_SESSION["perfil"] == "Administrador"){
			$stmt = Conexion::conectar()->prepare("SELECT puntaje_programa, puntaje_referencia, desviacion_programa, desviacion_referencia, anno FROM $tabla");
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT puntaje_programa, puntaje_referencia, desviacion_programa, desviacion_referencia, anno FROM $tabla WHERE id_programa = {$_SESSION['id_programa']}");
		}
		$stmt -> execute();
		return $stmt->fetchAll();
	
		$stmt = null;
	}
}

