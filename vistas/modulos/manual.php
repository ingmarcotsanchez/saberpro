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
                                        <span class="accordion-title">Cómo ingreso al aplicativo?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la url del aplicativo encontraremos un formulario de registro, el cuál
                                        nos solicitará nuestras credenciales (usuario y password).</p>
                                        <img src="vistas/img/manual/login.png">
                                        <p>Si los datos ingresados son incorrectos nos aparecera una alerta de error.</p>
                                        <img src="vistas/img/manual/login_error.png">
                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-2" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Inicio?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar correctamente los datos de ingreso, nos recibe la opción de inicio, en esta
                                        opción el administrador puede observar información diferente ingresada por los usuarios.</p>
                                        <img src="vistas/img/manual/inicio_admon.png">
                                        <p>En la parte superior puede observar cuantos centros regionales, cuantos programas y 
                                        cuantos usuarios se encuentran registrados en el aplicativo, adicionalmente, puede
                                        observa una serie de gráficos estadisticos con información relevante.</p>
                                        
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-1" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Usuarios?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Usuarios podemos visualizar la información más importante
                                            de los usuarios registrados en nuestra plataforma. Cómo lo es el último ingreso del usuario a nuestro
                                        sistema, el rol que tiene en nuestro sistema, estado actual del usuario <strong>(Activo / Inactivo)</strong> y el programa al que pertenece.
                                        Adicionalmente, podemos descargar esa información en formato pdf o excel.</p>
                                        <img src="vistas/img/manual/usuario_index.png">
                                        <p>Para adicionar un usuario nuevo oprimimos el botón azul ubicado en 
                                            la esquina superior izquierda el cual desplegará un formulario con los datos
                                            <strong>obligatorios</strong> para su creación.</p>
                                        <img src="vistas/img/manual/usuarios_nuevo.png">
                                        <p>Podemos desactivar usuarios oprimiendo el botón verde que se encuentra en cada 
                                            registro. Si un usuario no esta activo este no puede ingresar a la plataforma.</p>
                                        <img src="vistas/img/manual/usuarios_desactivado.png">
                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-2" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Centros?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a esta opción podemos visualizar los Centros Regionales que han sido
                                            creados en nuestro sistema. Adicionalmente, podemos descargar esa información en formato pdf o excel</p>
                                        <img src="vistas/img/manual/centros_index.png">
                                        <p>Para adicionar un Centro Regional oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        <strong>obligatorios</strong> para su creación.</p>
                                        <img src="vistas/img/manual/centros_nuevo.png">
                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-3" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Programas?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Programas podemos visualizar la información de los programas
                                            registrados en nuestra plataforma. Adicionalmente, podemos descargar esa información en formato pdf o excel</p>
                                        <img src="vistas/img/manual/programas_index.png">
                                        <p>Para adicionar un Programa oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        <strong>obligatorios</strong> para su creación</p>
                                        <img src="vistas/img/manual/programas_nuevo.png">
                                        <p>Para crear un registro debemos seleccionar el Centro Regional al que pertenece el Programa y la
                                            plataforma automaticamente le otorgará un consecutivo.</p>
                                        <img src="vistas/img/manual/programas_nuevo2.png">
                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-4" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Competencias?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Competencias podemos visualizar la información de las competencias que hemos
                                        registrado en nnuestra plataforma. Adicionalmente, podemos descargar esa información en formato pdf o excel.</p>
                                        <img src="vistas/img/manual/competencias_index.png">
                                        <p>Para adicionar una Competencia oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        <strong>obligatorios</strong> para su creación.</p>
                                        <img src="vistas/img/manual/competencias_nuevo.png">
                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-5" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Pruebas?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Pruebas podemos visualizar la información registrada anteriormente
                                        en nuestra plataforma. Adicionalmente, podemos descargar esa información en formato pdf o excel.</p>
                                        <img src="vistas/img/manual/pruebas_index.png">
                                        <p>Para adicionar una Prueba oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        <strong>obligatorios</strong> para su creación.</p>
                                        <img src="vistas/img/manual/pruebas_nuevo.png">
                                        <p>Para crear una prueba debemos seleccionar la competencia a la que pertenece la prueba y
                                                automaticamente la plataforma le otorgará un consecutivo y debemos escribir el nombre
                                                de la prueba.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-6" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Sub Competencias?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Sub Competencias podemos visualizar la información registrada anteriormente
                                        en nnuestra plataforma. Adicionalmente, podemos descargar esa información en formato pdf o excel.</p>
                                        <img src="vistas/img/manual/subcompetencias_index.png">
                                        <p>Para adicionar una Sub Competencia oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        obligatorios para su creación.</p>
                                        <img src="vistas/img/manual/subcompetencias_nuevo.png">
                                        <p>Para crear una Sub Competencia debemos seleccionar la prueba a la que pertenece la Sub Competencia y
                                                automaticamente la plataforma le otorgará un consecutivo.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-7" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Caracteristicas?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Caracteristicas podemos visualizar la información registrada anteriormente
                                        en nuestra plataforma. Adicionalmente, podemos descargar esa información en formato pdf o excel.</p>
                                        <img src="vistas/img/manual/caracteristicas_index.png">
                                        <p>Para adicionar una Caracteristica oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        <strong>obligatorios</strong> para su creación.</p>
                                        <img src="vistas/img/manual/caracteristicas_nuevo.png">
                                        <p>Para crear una Caracteristica debemos seleccionar la prueba a la que pertenece la Caracteristica, adicionar los puntajes obtenidos,
                                            escribir el nivel a que corresponde <strong>(Nivel 1, Nivel 2, Nivel 3)</strong> y escribir las caracteristicas necesarias.</p>
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
                                        <span class="accordion-title">Cómo ingreso al aplicativo?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la url del aplicativo encontraremos un formulario de registro, el cuál
                                        nos solicitará nuestras credenciales (usuario y password).</p>
                                        <img src="vistas/img/manual/login.png">
                                        <p>Si los datos ingresados son incorrectos nos aparecera una alerta de error.</p>
                                        <img src="vistas/img/manual/login_error.png">
                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-2" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Inicio?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar correctamente los datos de ingreso, nos recibe la opción de inicio, en esta
                                        opción el profesor líder puede observar información diferente ingresada anteriormente.</p>
                                        <img src="vistas/img/manual/inicio_lider.png">
                                        <p>En la parte superior puede observar el nombre del profesor que ingreso al sisitema junto a su perfil, 
                                        adicionalmente, puede observa una serie de gráficos estadisticos con información relevante.</p>
                                        
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-1" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Módulos?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Módulos podemos visualizar la información registrada anteriormente
                                        en nuestra plataforma. Adicionalmente, podemos descargar esa información en formato pdf o excel.</p>
                                        <img src="vistas/img/manual/modulos_index.png">
                                        <p>Para adicionar un Módulo oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        <strong>obligatorios</strong> para su creación.</p>
                                        <img src="vistas/img/manual/modulos_nuevo.png">
                                        <p>Para crear un Módulo debemos seleccionar la competencia a la que pertenece el módulo, la prueba, el centro regional y
                                        el programa, el aplicativo asignará un código y debemos terminar adicionando el puntaje y la desviación estandar.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-2" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Subcomponentes?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de sub componente podemos visualizar la información registrada anteriormente
                                        en nuestra plataforma. Adicionalmente, podemos descargar esa información en formato pdf o excel.</p>
                                        <img src="vistas/img/manual/subcomponentes_index.png">
                                        <p>Para adicionar un sub componente oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        <strong>obligatorios</strong> para su creación.</p>
                                        <img src="vistas/img/manual/subcomponentes_nuevo.png">
                                        <p>Para crear un sub componente debemos seleccionar el módulo, el aplicativo asignará un código y debemos terminar adicionando el puntaje y la desviación estandar.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-3" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Resultados?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Resultados podemos visualizar la información registrada anteriormente
                                        en nuestra plataforma. Adicionalmente, podemos descargar esa información en formato pdf o excel.</p>
                                        <img src="vistas/img/manual/resultados_index.png">
                                        <p>Para adicionar un Resultado oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        <strong>obligatorios</strong> para su creación.</p>
                                        <img src="vistas/img/manual/resultados_nuevo.png">
                                        <p>Para crear un Resultado debemos ingresar el puntaje y la desviación estandar del programa y
                                     el puntaje y la desviación estandar del grupo de referencia.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-4" aria-expanded="false">
                                        <span class="accordion-title">Qué puedo hacer en la opción de Mejoras?</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>Al ingresar a la opción de Mejoras podemos visualizar la información registrada anteriormente
                                        en nuestra plataforma. Adicionalmente, podemos descargar esa información en formato pdf o excel.</p>
                                        <img src="vistas/img/manual/mejoras_index.png">
                                        <p>Para adicionar un Mejoras oprimimos el botón azul ubicado en la 
                                        esquina superior izquierda el cual desplegará un formulario con los datos
                                        <strong>obligatorios</strong> para su creación.</p>
                                        <img src="vistas/img/manual/mejoras_nuevo.png">
                                        <p>Para crear un Mejoras debemos seleccionar la competencia a la que pertenece el módulo, la prueba, el centro regional y
                                        el programa, el aplicativo asignará un código y debemos terminar adicionando el puntaje y la desviación estandar.</p>
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



