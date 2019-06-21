<?php
// método del controller que consulta todos los usuarios de la BBDD
$columnaBD = null;
$valorBD = null;
$usuarios = ControllerUsuarios::controllerMostrarUsuarios($columnaBD, $valorBD);
?>
<div class="d-flex" id="wrapper">

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <div class="container-fluid contenedor">
            <h1 class="mt-4">Documentación</h1>
            <hr>
            <select class="custom-select" id="idUsuario">
                <option selected>Seleccione trabajador</option>
                <?php
                foreach ($usuarios as $key => $usuario) {
                    echo '<option value="' . $usuario["id_usuario"] . '">' . $usuario["nombre_usuario"] . '</option>';
                }
                ?>
            </select>
            <br><br>

            <div id="divArchivos">
                <div class="row" id="ads">
                    <!-- Documentos -->

                    <!-- Contrato de trabajo -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="botones btn btn-success cargar0 disabled" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="botones btn btn-secondary descargar0 disabled" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="botones btn btn-warning modificar0 disabled" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" id="btnEliminarArchivo" class="botones btn btn-danger eliminar0 disabled" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Entrega EPPS -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="botones btn btn-success cargar1 disabled" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="botones btn btn-secondary descargar1 disabled" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="botones btn btn-warning modificar1 disabled" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" id="btnEliminarArchivo" class="botones btn btn-danger eliminar1 disabled" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Examenes Psicosensotecnicos -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="botones btn btn-success cargar2 disabled" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="botones btn btn-secondary descargar2 disabled" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="botones btn btn-warning modificar2 disabled" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" id="btnEliminarArchivo" class="botones btn btn-danger eliminar2 disabled" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Procedimientos trabajos -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="botones btn btn-success cargar3 disabled" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="botones btn btn-secondary descargar3 disabled" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="botones btn btn-warning modificar3 disabled" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" id="btnEliminarArchivo" class="botones btn btn-danger eliminar3 disabled" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="ads">

                    <!-- Examenes ocupacionales -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="botones btn btn-success cargar4 disabled" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="botones btn btn-secondary descargar4 disabled" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="botones btn btn-warning modificar4 disabled" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" id="btnEliminarArchivo" class="botones btn btn-danger eliminar4 disabled" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Reglamento interno -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="botones btn btn-success cargar5 disabled" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="botones btn btn-secondary descargar5 disabled" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="botones btn btn-warning modificar5 disabled" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" id="btnEliminarArchivo" class="botones btn btn-danger eliminar5 disabled" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Derecho a saber -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="botones btn btn-success cargar6 disabled" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="botones btn btn-secondary descargar6 disabled" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="botones btn btn-warning modificar6 disabled" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" id="btnEliminarArchivo" class="botones btn btn-danger eliminar6 disabled" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Hoja de vida de conductor -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="botones btn btn-success cargar7 disabled" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="botones btn btn-secondary descargar7 disabled" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="botones btn btn-warning modificar7 disabled" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" id="btnEliminarArchivo" class="botones btn btn-danger eliminar7 disabled" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- input ocultos para eliminar archivos -->
    <input type="hidden" id="elim_usuario" name="elim_usuario">
    <input type="hidden" id="elim_archivo" name="elim_archivo">
    <input type="hidden" id="elim_registro" name="elim_registro">

    <!-- /#page-content-wrapper -->

</div>

<!-- Modal registrar archivo -->
<div class="modal fade" id="modaRegistrarArchivo">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo archivo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">

                    <!-- div Archivo -->
                    <div class="form-group">
                        <input type="file" name="registrarArchivo" id="registrarArchivo" class="registrarArchivo">
                        <input type="hidden" id="upld_usuario" name="upld_usuario">
                        <input type="hidden" id="upld_archivo" name="upld_archivo">
                        <input type="hidden" id="upld_registro" name="upld_registro">
                        <p class="help-block">Peso máximo del archivo: 10mb</p>
                        <img src="view/componentes/images/pdf.png" alt="Anonimo" class="img-thumbnail previsualizar" width="150px">
                    </div>

                    <!-- div de errores -->
                    <div class="form-group" id="errorValidacion">
                    </div>

                    <button type="submit" id="btnCrearArchivo" class="btn btn-primary">Crear Usuario</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal descargar archivo -->
<div class="modal fade" id="modalDescargarArchivo">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Descargar archivo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <!-- div Archivo -->
                <div class="form-group">
                    <a id="descargarUrl">
                        <img src="view/componentes/images/pdf.png" alt="Anonimo" class="img-thumbnail previsualizar" width="150px">
                    </a>
                </div>

                <!-- div de errores -->
                <div class="form-group" id="errorValidacion">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal editar archivo -->
<div class="modal fade" id="modalEditarArchivo">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar archivo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">

                    <!-- div Archivo -->
                    <div class="form-group">
                        <input type="file" name="editarArchivo" id="editarArchivo" class="editarArchivo">
                        <input type="hidden" id="edit_usuario" name="edit_usuario">
                        <input type="hidden" id="edit_archivo" name="edit_archivo">
                        <input type="hidden" id="edit_registro" name="edit_registro">
                        <p class="help-block">Peso máximo del archivo: 10mb</p>
                        <img src="view/componentes/images/pdf.png" alt="Anonimo" class="img-thumbnail previsualizar" width="150px">
                    </div>

                    <!-- div de errores -->
                    <div class="form-group" id="errorValidacion">
                    </div>

                    <button type="submit" id="btnEditarArchivo" class="btn btn-primary">Editar archivo</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- JS modulo usuarios -->
<script src="view/js/archivos.js"></script>

<?php
// controller: registrar archivo
$regArchivo = new ControllerArchivos();
$regArchivo->controllerRegistrarArchivo();

// controller: editar archivo
$editArchivo = new ControllerArchivos();
$editArchivo->controllerEditarArchivo();

// controller: eliminar usuario
$elimArchivo = new ControllerArchivos();
$elimArchivo->controllerBorrarArchivo();
?>