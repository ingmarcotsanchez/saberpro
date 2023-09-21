<?php
require_once "conexion.php";
//session_start();
class ModeloModulos{
	/*Mostrar Modulo*/
	static public function mdlMostrarModulos($tabla, $item, $valor, $orden){
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

	static public function mdlMostrarModulosPrograma($tabla, $item, $valor, $orden){
		
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND id_programa = {$_SESSION['id_programa']} ORDER BY id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_programa = {$_SESSION['id_programa']} ORDER BY $orden DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt = null;
	}

	/*Ingresar un modulo*/
	static public function mdlIngresarModulo($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_competencia, id_programa, codigo, descripcion, puntaje, desv_estand) VALUES (:id_competencia,:id_programa, :codigo, :descripcion, :puntaje, :desv_estand)");
		$stmt->bindParam(":id_competencia", $datos["id_competencia"], PDO::PARAM_INT);
		$stmt->bindParam(":id_programa", $datos["id_programa"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":puntaje", $datos["puntaje"], PDO::PARAM_STR);
		$stmt->bindParam(":desv_estand", $datos["desv_estand"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt = null;
	}
	/*Editar modulo*/
	static public function mdlEditarModulo($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_competencia = :id_competencia, id_programa = :id_programa, descripcion = :descripcion, puntaje = :puntaje, desv_estand = :desv_estand WHERE codigo = :codigo");
		$stmt->bindParam(":id_competencia", $datos["id_competencia"], PDO::PARAM_INT);
		$stmt->bindParam(":id_programa", $datos["id_programa"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":puntaje", $datos["puntaje"], PDO::PARAM_STR);
		$stmt->bindParam(":desv_estand", $datos["desv_estand"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt = null;
	}
	/*Borrar Modulo*/
	static public function mdlEliminarModulo($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt = null;
	}
	/*Actualizar modulo*/

	static public function mdlActualizarModulo($tabla, $item1, $valor1, $valor){
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

	/*Graficas*/
	static public function mdlGraficaModulosPuntaje($tabla){
		if($_SESSION["perfil"] == "Administrador"){
			$stmt = Conexion::conectar()->prepare("SELECT descripcion, puntaje, desv_estand FROM $tabla");
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT descripcion, puntaje, desv_estand FROM $tabla WHERE id_programa = {$_SESSION['id_programa']}");
		}
		//var_dump("SELECT descripcion, puntaje, desv_estand FROM $tabla WHERE id_programa = {$_SESSION['id_programa']}");
		$stmt -> execute();
		return $stmt->fetchAll();

		$stmt = null;
	}

}