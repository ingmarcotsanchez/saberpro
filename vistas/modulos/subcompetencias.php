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
        <h1>Administrar Sub Competencias</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Sub Competencias</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSubCompetencia">
                Agregar SubCompetencias
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaSubCompetencia" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Prueba</th>
                            <th>Acciones</th>
                        </tr> 
                    </thead>
                </table>
                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
            </div>
        </div>
    </section>
</div>

<!--Agregar una SubCompetencia-->
<div id="modalAgregarSubCompetencia" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar una SubCompetencia</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" id="nuevaPrueba" name="nuevaPrueba" required>
                                <option value="">Selecionar Prueba</option>
                                <?php
                                    $item = null;
                                    $valor = null;
                                    $orden = null;
                                    $pruebas = ControladorPruebas::ctrMostrarPruebas($item, $valor,$orden);
                                    foreach ($pruebas as $key => $value) {
                                        echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Prueba</button>
                </div>
            </form>
            <?php
                $crearSubcompentencia = new ControladorSubcompetencias();
                $crearSubcompentencia -> ctrCrearSubcompetencia();
            ?>  
        </div>
    </div>
</div>

<!--Editar modulo-->

<div id="modalEditarSubCompetencia" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar SubCompetencia</h4>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar SubCompetencia</button>
                </div>
            </form>
            <?php
                $editarSubcompetencia = new ControladorSubcompetencias();
                $editarSubcompetencia -> ctrEditarSubCompetencia();
            ?>      
        </div>
    </div>
</div>
<?php
  $eliminarSubcompetencia = new ControladorSubcompetencias();
  $eliminarSubcompetencia -> ctrEliminarSubCompetencia();
?>      



