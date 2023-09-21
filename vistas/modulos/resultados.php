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
        <h1>Administrar Resultados Globales</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Resultados Globales</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarResultado">
                Agregar Resultado Global
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Puntaje del Programa</th>
                            <th>Puntaje Grupo Referencia</th>
                            <th>Puntaje Diferencia</th>
                            <th>Desv Estandar Programa</th>
                            <th>Desv Estandar Grupo</th>
                            <th>Desv Estandar Diferencia</th>
                            <th>Acciones</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php
                            $item = null;
                            $valor = null;
                            $resultados = ControladorResultados::ctrMostrarResultados($item, $valor);
                            foreach ($resultados as $key => $value) {
                                echo ' <tr>
                                    <td>'.($key+1).'</td>
                                    <td class="text-uppercase">'.$value["puntaje_programa"].'</td>
                                    <td class="text-uppercase">'.$value["puntaje_referencia"].'</td>
                                    <td class="text-uppercase">'.$value["puntaje_diferencia"].'</td>
                                    <td class="text-uppercase">'.$value["desviacion_programa"].'</td>
                                    <td class="text-uppercase">'.$value["desviacion_referencia"].'</td>
                                    <td class="text-uppercase">'.$value["desviacion_diferencia"].'</td>
                                    <td>
                                    <div class="btn-group">  
                                    <button class="btn btn-warning btnEditarResultado" idResultado="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarResultado"><i class="fa fa-pencil"></i></button>';
                                        if($_SESSION["perfil"] == "Administrador"){
                                            echo '<button class="btn btn-danger btnEliminarResultado" idResultado="'.$value["id"].'"><i class="fa fa-times"></i></button>';
                                        }
                                    echo '</div>  
                                    </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!--Agregar un resultado global-->
<div id="modalAgregarResultado" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar un Resultado Global</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                                    <input type="number" class="form-control input-lg" id="nuevoPuntajePrograma" name="nuevoPuntajePrograma" step="any" min="0" max="200" placeholder="Puntaje del Programa" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-minus"></i></span> 
                                    <input type="text" class="form-control input-lg" id="nuevoPuntajeReferencia" name="nuevoPuntajeReferencia" step="any" min="0" max="200" placeholder="Puntaje del Grupo de Referencia" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                                    <input type="number" class="form-control input-lg" id="nuevoDesviacionPrograma" name="nuevoDesviacionPrograma" step="any" min="0" max="200" placeholder="Desv. Estandar del Programa" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-minus"></i></span> 
                                    <input type="text" class="form-control input-lg" id="nuevoDesviacionReferencia" name="nuevoDesviacionReferencia" step="any" min="0" max="200" placeholder="Desv. Estandar del Grupo de Referencia" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Resultado Global</button>
                </div>
            </form>
            <?php
                $crearResultado = new ControladorResultados();
                $crearResultado -> ctrCrearResultado();
            ?>  
        </div>
    </div>
</div>

<!--Editar resultado-->

<div id="modalEditarResultado" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Resultado</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                    <div class="form-group row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                                    <input type="number" class="form-control input-lg" id="editarPuntajePrograma" name="editarPuntajePrograma" step="any" min="0" max="200" placeholder="Puntaje del Programa" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-minus"></i></span> 
                                    <input type="text" class="form-control input-lg" id="editarPuntajeReferencia" name="editarPuntajeReferencia" step="any" min="0" max="200" placeholder="Puntaje del Grupo de Referencia" required>
                                </div>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                                <input type="number" class="form-control input-lg" name="editarPuntajeDiferencia" placeholder="Puntaje de Referencia" readonly required>
                            </div>
                        </div>-->
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                                    <input type="number" class="form-control input-lg" id="editarDesviacionPrograma" name="editarDesviacionPrograma" step="any" min="0" max="200" placeholder="Desv. Estandar del Programa" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-minus"></i></span> 
                                    <input type="text" class="form-control input-lg" id="editarDesviacionReferencia" name="editarDesviacionReferencia" step="any" min="0" max="200" placeholder="Desv. Estandar del Grupo de Referencia" required>
                                </div>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                                <input type="number" class="form-control input-lg" name="editarDesviacionDiferencia" placeholder="Desv. Estandar de Referencia" readonly required>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
            <?php
                $editarResultado = new ControladorResultados();
                $editarResultado -> ctrEditarResultado();
            ?>      
        </div>
    </div>
</div>
<?php
  $eliminarResultado = new ControladorResultados();
  $eliminarResultado -> ctrEliminarResultado();
?>      



