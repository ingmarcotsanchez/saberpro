<?php
if($_SESSION["perfil"] == "Profesor"){
    echo '<script>
      window.location = "inicio";
    </script>';
    return;
  }
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Características de aprendizaje</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Características de Aprendizaje</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCaracteristica">
                Agregar Características de aprendizaje
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaCaracteristicas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Prueba</th>
                            <th>Puntaje Inicial</th>
                            <th>Puntaje Final</th>
                            <th>Nivel de desempeño</th>
                            <th>Características de aprendizaje</th>
                            <th>Agregado</th>
                            <th>Acciones</th>
                        </tr> 
                    </thead>
                </table>
                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
            </div>
        </div>
    </section>
</div>

<!--Agregar Caracteristicas de aprendizaje-->
<div id="modalAgregarCaracteristica" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Caracteristicas de Aprendizaje</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" id="nuevoPrueba" name="nuevoPrueba" required>
                                <option value="">Selecionar Prueba</option>
                                <?php
                                    $item = null;
                                    $valor = null;
                                    $orden = "id";
                                    $pruebas = ControladorPruebas::ctrMostrarPruebas($item, $valor,$orden);
                                    foreach ($pruebas as $key => $value) {
                                        echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                                    <input type="number" class="form-control input-lg" id="nuevoPuntajeInicial" name="nuevoPuntajeInicial" step="any" min="0" max="300" placeholder="Puntaje Inicial" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-minus"></i></span> 
                                    <input type="number" class="form-control input-lg" id="nuevoPuntajeFinal" name="nuevoPuntajeFinal" step="any" min="0" max="300" placeholder="Puntaje Final" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                                <input type="text" class="form-control input-lg" name="nuevoNivel" placeholder="Nivel de desempeño" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <fieldset class="form-group">
                                <label class="form-label semibold">Característica</label>
                                <div class="summernote-theme-1">
                                    <textarea id="summernote" name="nuevaCaracteristica"></textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Características</button>
                </div>
            </form>
            <?php
                $crearCaracteristica = new ControladorCaracteristicas();
                $crearCaracteristica -> ctrCrearCaracteristica();
            ?>  
        </div>
    </div>
</div>

<!--Editar Caracteristicas de aprendizaje-->

<div id="modalEditarCaracteristica" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Caracteristicas de aprendizaje</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" name="editarPrueba" readonly required>
                                    <option id="editarPrueba"></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                                    <input type="number" class="form-control input-lg" id="editarPuntajeInicial" name="editarPuntajeInicial" step="any" min="0" max="300" placeholder="Puntaje Inicial" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-minus"></i></span> 
                                    <input type="number" class="form-control input-lg" id="editarPuntajeFinal" name="editarPuntajeFinal" step="any" min="0" max="300" placeholder="Puntaje Final" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                                <input type="text" class="form-control input-lg" id="editarNivel" name="editarNivel" placeholder="Nivel de desempeño" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <fieldset class="form-group">
                                <label class="form-label semibold">Caracteristica</label>
                                <div class="summernote-theme-1">
                                    <textarea id="summernote" name="editarCaracteristica"></textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
            <?php
                $editarCaracteristica = new ControladorCaracteristicas();
                $editarCaracteristica -> ctrEditarCaracteristica();
            ?>      
        </div>
    </div>
</div>
<?php
  $eliminarCaracteristica = new ControladorCaracteristicas();
  $eliminarCaracteristica -> ctrBorrarCaracteristica();
?>      



