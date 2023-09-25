<?php
if($_SESSION["perfil"] == "profesor"){
  echo '<script>
            window.location = "inicio";
        </script>';
  return;
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Sub Componentes</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Sub Componentes</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarComponente">
                Agregar Componentes
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaSubcomponentes" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Módulo</th>
                            <th>Puntaje</th>
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

<!--Agregar un subcomponentes-->
<div id="modalAgregarComponente" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar un Sub Componente</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" id="nuevoModulo" name="nuevoModulo" required>
                                <option value="">Selecionar Módulo</option>
                                <?php
                                    $item = null;
                                    $valor = null;
                                    $orden = "id";
                                    $modulos = ControladorModulos::ctrMostrarModulos($item, $valor, $orden);
                                    
                                    foreach ($modulos as $key => $value) {
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
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                                <input type="number" class="form-control input-lg" name="nuevoPuntaje" placeholder="Ingresar el puntaje" required max="100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Subcomponente</button>
                </div>
            </form>
            <?php
                $crearSubcomponente = new ControladorSubComponentes();
                $crearSubcomponente -> ctrCrearSubcomponente();
            ?>  
        </div>
    </div>
</div>

<!--Editar Competencia-->

<div id="modalEditarSubcomponente" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Competencia</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <!--<input type="text" name="id" value="'.$_SESSION["id"].'">-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <select class="form-control input-lg" name="editarModulo" readonly required>
                                    <option id="editarModulo"></option>
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
                                    <input type="number" class="form-control input-lg" id="editarPuntaje" name="editarPuntaje" min="0" max="100" required>
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
                $editarSubComponente = new ControladorSubComponentes();
                $editarSubComponente -> ctrEditarSubComponente();
            ?>      
        </div>
    </div>
</div>
<?php
  $eliminarSubComponente = new ControladorSubComponentes();
  $eliminarSubComponente -> ctrEliminarSubComponente();
?>      



