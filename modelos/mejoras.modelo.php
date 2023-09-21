<?php
require_once "conexion.php";
class ModeloMejoras{
	/*Mostrar Mejoras*/
	static public function mdlMostrarMejoras($tabla, $item, $valor, $orden){
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

	/*Ingresar una Mejoras*/
	static public function mdlIngresarMejora($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_subcomponente, que, como, quien, cuando) VALUES (:id_subcomponente, :que, :como, :quien, :cuando)");
		$stmt->bindParam(":id_subcomponente", $datos["id_subcomponente"], PDO::PARAM_INT);
		$stmt->bindParam(":que", $datos["que"], PDO::PARAM_STR);
		$stmt->bindParam(":como", $datos["como"], PDO::PARAM_STR);
		$stmt->bindParam(":quien", $datos["quien"], PDO::PARAM_STR);
        $stmt->bindParam(":cuando", $datos["cuando"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		
		$stmt = null;
	}
	/*Editar Mejoras*/
	static public function mdlEditarMejora($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_subcomponente = :id_subcomponente, que = :que, como = :como, quien = :quien, cuando = :cuando WHERE id = :id");
		$stmt->bindParam(":id_subcomponente", $datos["id_subcomponente"], PDO::PARAM_INT);
		$stmt->bindParam(":que", $datos["que"], PDO::PARAM_STR);
		$stmt->bindParam(":como", $datos["como"], PDO::PARAM_STR);
		$stmt->bindParam(":quien", $datos["quien"], PDO::PARAM_STR);
        $stmt->bindParam(":cuando", $datos["cuando"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		
		$stmt = null;
	}
	/*Borrar Mejoras*/
	static public function mdlEliminarMejora($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		
		$stmt = null;
	}
	/*Actualizar Mejoras*/

	static public function mdlActualizarMejora($tabla, $item1, $valor1, $valor){
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