    <?php
if($_SESSION["perfil"] == "Profesor"){
  echo '<script>
            window.location = "inicio";
        </script>';
  return;
}
session_start();
?>

<link rel="stylesheet" href="vistas/dist/css/manual.css">
<div class="content-wrapper">
    <section class="content-header">
        <h1>&nbsp;</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Manual</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="ml-4">
                <h1 class="text-title">Manual de Usuario
                    <span class="text-primary">SABER PRO</span>
                </h1>
            </div>
            <?php
            if($_SESSION["perfil"] == "Administrador"){
            echo '
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title text-subtitle">Rol Administrador</h3>
                        </div>
                        <div class="box-body">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button id="accordion-button-1" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Usuarios?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Usuarios podemos visualizar la información más importante
                                            de los usuarios registrados en nuestra plataforma. Cómo lo es el último ingreso del usuario a nuestro
                                        sistema, el rol que tiene en nuestro sistema, estado actual del usuario y el programa al que pertenece.</p>
                                        <img src="vistas/img/manual/usuario_index.png">
                                        <p>Para adicionar un usuario nuevo oprimimos el botón azul ubicado en 
                                            la esquina superior izquierda el cual desplegará un formulario con los datos
                                                obligatorios para su creación.</p>
                                        <img src="vistas/img/manual/usuarios_nuevo.png">
                                        <p>Podemos desactivar usuarios oprimiendo el botón verde que se encuentra en cada 
                                            registro. Si un usuario no esta activo este no puede ingresar a la plataforma.</p>
                                        <img src="vistas/img/manual/usuarios_desactivado.png">
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-2" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Centros?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a esta opción podemos visualizar los Centros Regionales que han sido
                                            creados en nuestro sistema.</p>
                                        <img src="vistas/img/manual/centros_index.png">
                                        <p>Para adicionar un Centro Regional oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        obligatorios para su creación.</p>
                                        <img src="vistas/img/manual/centros_nuevo.png">
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-3" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Programas?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Programas podemos visualizar la información de los programas
                                            registrados en nuestra plataforma.</p>
                                        <img src="vistas/img/manual/programas_index.png">
                                        <p>Para adicionar un Programa oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        obligatorios para su creación</p>
                                        <img src="vistas/img/manual/programas_nuevo.png">
                                        <p>Para crear un registro debemos seleccionar el Centro Regional al que pertenece el Programa y la
                                            plataforma automaticamente le otorgara un consecutivo.</p>
                                        <img src="vistas/img/manual/programas_nuevo2.png">
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-4" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Competencias?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Programas podemos visualizar la información de los programas
                                            registrados en nnuestra plataforma.</p>
                                        <img src="vistas/img/manual/programas_index.png">
                                        <p>Para adicionar un Programa oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        obligatorios para su creación.</p>
                                        <img src="vistas/img/manual/programas_nuevo.png">
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-5" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Pruebas?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Pruebas podemos visualizar la información registrada anteriormente
                                        en nnuestra plataforma.</p>
                                        <img src="vistas/img/manual/programas_index.png">
                                        <p>Para adicionar una Prueba oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        obligatorios para su creación.</p>
                                        <img src="vistas/img/manual/programas_nuevo.png">
                                        <p>Para crear una prueba debemos seleccionar la competencia a la que pertenece la prueba y
                                                automaticamente la plataforma le otorgará un consecutivo.</p>
                                        <img src="vistas/img/manual/programas_nuevo2.png">
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-6" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Sub Competencias?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Sub Competencias podemos visualizar la información registrada anteriormente
                                        en nnuestra plataforma.</p>
                                        <img src="vistas/img/manual/programas_index.png">
                                        <p>Para adicionar una Sub Competencia oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        obligatorios para su creación.</p>
                                        <img src="vistas/img/manual/programas_nuevo.png">
                                        <p>Para crear una Sub Competencia debemos seleccionar la prueba a la que pertenece la Sub Competencia y
                                                automaticamente la plataforma le otorgará un consecutivo.</p>
                                        <img src="vistas/img/manual/programas_nuevo2.png">
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-7" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Caracteristicas?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Caracteristicas podemos visualizar la información registrada anteriormente
                                        en nnuestra plataforma.</p>
                                        <img src="vistas/img/manual/programas_index.png">
                                        <p>Para adicionar una Caracteristica oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        obligatorios para su creación.</p>
                                        <img src="vistas/img/manual/programas_nuevo.png">
                                        <p>Para crear una Caracteristica debemos seleccionar la prueba a la que pertenece la Caracteristica, adicionar los puntajes obtenidos,
                                            escribir el nivel a que corresponde y escribir las caracteristicas necesarias.</p>
                                        <img src="vistas/img/manual/programas_nuevo2.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }else{
                echo '
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title text-subtitle">Rol Líder</h3>
                        </div>
                        <div class="box-body">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button id="accordion-button-1" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Módulos?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Usuarios podemos visualizar la información más importante
                                            de los usuarios registrados en nuestra plataforma. Cómo lo es el último ingreso del usuario a nuestro
                                        sistema, el rol que tiene en nuestro sistema, estado actual del usuario y el programa al que pertenece.</p>
                                        <img src="vistas/img/manual/usuario_index.png">
                                        <p>Para adicionar un usuario nuevo oprimimos el botón azul ubicado en 
                                            la esquina superior izquierda el cual desplegará un formulario con los datos
                                                obligatorios para su creación.</p>
                                        <img src="vistas/img/manual/usuarios_nuevo.png">
                                        <p>Podemos desactivar usuarios oprimiendo el botón verde que se encuentra en cada 
                                            registro. Si un usuario no esta activo este no puede ingresar a la plataforma.</p>
                                        <img src="vistas/img/manual/usuarios_desactivado.png">
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-2" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Subcomponentes?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a esta opción podemos visualizar los Centros Regionales que han sido
                                            creados en nuestro sistema.</p>
                                        <img src="vistas/img/manual/centros_index.png">
                                        <p>Para adicionar un Centro Regional oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        obligatorios para su creación.</p>
                                        <img src="vistas/img/manual/centros_nuevo.png">
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-3" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Resultados?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Programas podemos visualizar la información de los programas
                                            registrados en nuestra plataforma.</p>
                                        <img src="vistas/img/manual/programas_index.png">
                                        <p>Para adicionar un Programa oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        obligatorios para su creación</p>
                                        <img src="vistas/img/manual/programas_nuevo.png">
                                        <p>Para crear un registro debemos seleccionar el Centro Regional al que pertenece el Programa y la
                                            plataforma automaticamente le otorgara un consecutivo.</p>
                                        <img src="vistas/img/manual/programas_nuevo2.png">
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-4" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Mejoras?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Programas podemos visualizar la información de los programas
                                            registrados en nnuestra plataforma.</p>
                                        <img src="vistas/img/manual/programas_index.png">
                                        <p>Para adicionar un Programa oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        obligatorios para su creación.</p>
                                        <img src="vistas/img/manual/programas_nuevo.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </section>
</div>
<script src="vistas/dist/js/script.js"></script>
<?php
  $eliminarModulo = new ControladorModulos();
  $eliminarModulo -> ctrEliminarModulo();
?>      



