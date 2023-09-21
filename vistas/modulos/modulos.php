    <?php
if($_SESSION["perfil"] == "Profesor"){
  echo '<script>
            window.location = "inicio";
        </script>';
  return;
}
session_start();
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Modulos</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar modulos</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
            <?php
                if($_SESSION["perfil"] != "Administrador"){
                echo '<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarModulo">
                Agregar Modulo
                </button>';
            }
            ?>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaModulos" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Competencia</th>
                            <th>Programa</th>
                            <th>Puntaje</th>
                            <th>Desv Estandar</th>
                            <th>Nivel Desempeño</th
                            
                            <th>Acciones</th>
                        </tr> 
                    </thead>
                </table>
                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
            </div>
        </div>
    </section>
</div>

<!--Agregar un modulo-->
<div id="modalAgregarModulo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar un modulo</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" id="nuevaCompetencia" name="nuevaCompetencia" required>
                                <option value="">Selecionar competencia</option>
                                <?php
                                    $item = null;
                                    $valor = null;
                                    $competencias = ControladorCompetencias::ctrMostrarCompetencias($item, $valor);
                                    foreach ($competencias as $key => $value) {
                                        echo '<option value="'.$value["id"].'">'.$value["competencia"].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" id="nuevaPrueba" name="nuevaDescripcion" required>
                                <option value="">Selecionar prueba</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" id="nuevoCentro" name="nuevoCentro" required>
                                <option value="">Selecionar centro regional</option>
                                <?php
                                    $item = null;
                                    $valor = null;
                                    $centros = ControladorCentros::ctrMostrarCentros($item, $valor);
                                    foreach ($centros as $key => $value) {
                                        echo '<option value="'.$value["id"].'">'.$value["centro"].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" id="nuevoPrograma" name="nuevoPrograma" required>
                                <option value="">Selecionar programa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <div class="col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                                <input type="number" class="form-control input-lg" name="nuevoPuntaje" min="0" placeholder="Ingrese el puntaje" required>
                            </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                                    <input type="number" class="form-control input-lg" id="nuevoDesvEstand" name="nuevoDesvEstand" step="any" min="0" placeholder="Desviación Estandar" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar modulo</button>
                </div>
            </form>
            <?php
                $crearModulo = new ControladorModulos();
                $crearModulo -> ctrCrearModulo();
            ?>  
        </div>
    </div>
</div>

<!--Editar modulo-->

<div id="modalEditarModulo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Modulo</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" name="editarCompetencia" readonly required>
                                    <option id="editarCompetencia"></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" name="editarPrograma" readonly required>
                                    <option id="editarPrograma"></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">  
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>
                            </div>
                        </div>
                        <div class="form-group">  
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                                    <input type="number" class="form-control input-lg" id="editarPuntaje" name="editarPuntaje" min="0" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                                    <input type="number" class="form-control input-lg" id="editarDesvEstand" name="editarDesvEstand" step="any" min="0" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
            <?php
                $editarModulo = new ControladorModulos();
                $editarModulo -> ctrEditarModulo();
            ?>      
        </div>
    </div>
</div>
<?php
  $eliminarModulo = new ControladorModulos();
  $eliminarModulo -> ctrEliminarModulo();
?>      



