<?php

/*=============================================
Mostrar errores
=============================================*/

ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log",  "saberpro/php_error_log");
error_reporting(E_ERROR | E_PARSE);

require_once "modelos/funciones.php";



require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/centros.controlador.php";
require_once "controladores/competencias.controlador.php";
require_once "controladores/programas.controlador.php";
require_once "controladores/modulos.controlador.php";
require_once "controladores/pruebas.controlador.php";
require_once "controladores/subcomponentes.controlador.php";
require_once "controladores/resultados.controlador.php";
require_once "controladores/caracteristicas.controlador.php";
require_once "controladores/subcompetencias.controlador.php";
require_once "controladores/mejoras.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/centros.modelo.php";
require_once "modelos/competencias.modelo.php";
require_once "modelos/programas.modelo.php";
require_once "modelos/modulos.modelo.php";
require_once "modelos/pruebas.modelo.php";
require_once "modelos/subcomponentes.modelo.php";
require_once "modelos/resultados.modelo.php";
require_once "modelos/caracteristicas.modelo.php";
require_once "extensiones/vendor/autoload.php";
require_once "modelos/subcompetencias.modelo.php";
require_once "modelos/mejoras.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();