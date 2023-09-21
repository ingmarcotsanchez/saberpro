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
        <h1>Administrar Pruebas</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Pruebas</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPrueba">
                Agregar Pruebas
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaPrueba" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Competencia</th>
                            <th>Acciones</th>
                        </tr> 
                    </thead>
                </table>
                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
            </div>
        </div>
    </section>
</div>

<!--Agregar una Prueba-->
<div id="modalAgregarPrueba" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar una Prueba</h4>
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
                $crearPrueba = new ControladorPruebas();
                $crearPrueba -> ctrCrearPrueba();
            ?>  
        </div>
    </div>
</div>

<!--Editar modulo-->

<div id="modalEditarPrueba" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Prueba</h4>
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
                    <button type="submit" class="btn btn-primary">Guardar Pruebas</button>
                </div>
            </form>
            <?php
                $editarPrueba = new ControladorPruebas();
                $editarPrueba -> ctrEditarPrueba();
            ?>      
        </div>
    </div>
</div>
<?php
  $eliminarPrueba = new ControladorPruebas();
  $eliminarPrueba -> ctrEliminarPrueba();
?>      



