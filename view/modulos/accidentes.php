<div class="container-fluid contenedor">
    <h1 class="mt-4">Registro de accidentes</h1>
    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistrarIncidente">Agregar</button><br>
    <br>
    <div class="tabla">
        <table id="tablaUser" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo accidente</th>
                    <th>Tipo accidente</th>
                    <th>Fecha</th>
                    <th>Afectado</th>
                    <th>Prevencionista</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // método del controller que consulta todos los incidentes de la BBDD
                $columnaBD = null;
                $valorBD = null;
                $usuarios = ControllerUsuarios::controllerMostrarUsuarios($columnaBD, $valorBD);
                $tipoIncidentes = ControllerTiposIncidentes::controllerMostrarTiposIncidentes($columnaBD, $valorBD);
                $regIncidentes = ControllerIncidentes::controllerMostrarIncidentes($columnaBD, $valorBD);

                // foreach que permite el llenado automático de los incidentes en la tabla
                foreach ($regIncidentes as $key => $regIncidente) {
                    // id, nombre y alias
                    echo '
                        <tr>
                        <td>' . $regIncidente["id_registro_incidente"] . '</td>
                        <td>' . $regIncidente["titulo_registro_incidente"] . '</td>';

                    // tipo de accidente
                    foreach ($tipoIncidentes as $key => $tipoIncidente) {
                        if ($regIncidente["tipo_registro_incidente_fk"] == $tipoIncidente["id_tipo_incidente"]) {
                            echo '<td>' . $tipoIncidente["nombre_tipo_incidente"] . '</td>';
                            break;
                        }
                    }

                    // fecha
                    echo '<td>' . $regIncidente["fecha_registro_incidente"] . '</td>';

                    // afectado
                    foreach ($usuarios as $key => $usuario) {
                        if ($regIncidente["afectado_registro_incidente_fk"] == $usuario["id_usuario"]) {
                            echo '<td>' . $usuario["nombre_usuario"] . '</td>';
                            break;
                        }
                    }

                    // prevencionista
                    foreach ($usuarios as $key => $usuario) {
                        if ($_SESSION["id"] == $usuario["id_usuario"]) {
                            echo '<td>' . $usuario["nombre_usuario"] . '</td>';
                            break;
                        }
                    }

                    // acciones de modificar o eliminar
                    echo '
                    <td>
                        <button class="btn btn-warning btnEditarIncidente" idIncidente="' . $regIncidente["id_registro_incidente"] . '" data-toggle="modal" data-target="#modalEditarIncidente">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btnEliminarIncidente" idIncidente="' . $regIncidente["id_registro_incidente"] . '">
                          <i class="fas fa-user-times"></i>
                        </button>
                    </td>
                    </tr>';
                }
                // fin foreach
                ?>
            </tbody>
        </table>
    </div>
    <div>
        <hr>
    </div>
</div>

<!-- Modal Registrar incidente -->
<div class="modal fade" id="modalRegistrarIncidente">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo incidente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <!-- Nombre incidente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-plus"></i></div>
                            </div>
                            <input type="text" class="form-control" name="nuevoTitulo" id="nuevoTitulo" placeholder="Ingrese su titulo del incidente">
                        </div>
                    </div>

                    <!-- tipo incidente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-list-ul"></i></div>
                            </div>
                            <select class="form-control input-lg" name="nuevoTipoIncidente" id="nuevoTipoIncidente">
                                <option value="">Seleccione el tipo de incidente</option>
                                <?php
                                // foreach para rellenar la tabla de roles
                                foreach ($tipoIncidentes as $key => $tipoIncidente) {
                                    echo '<option value="' . $tipoIncidente["id_tipo_incidente"] . '">' . $tipoIncidente["nombre_tipo_incidente"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- afectado -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-list-ul"></i></div>
                            </div>
                            <select class="form-control input-lg" name="nuevoAfectado" id="nuevoAfectado">
                                <option value="">Seleccione el usuario afectado</option>
                                <?php
                                // foreach para rellenar la tabla de roles
                                foreach ($usuarios as $key => $usuario) {
                                    echo '<option value="' . $usuario["id_usuario"] . '">' . $usuario["nombre_usuario"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Comentarios -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <textarea class="form-control" rows="5" name="nuevoComentario" id="nuevoComentario"></textarea>
                        </div>
                    </div>

                    <!-- div de errores -->
                    <div class="form-group" id="errorValidacion">
                    </div>

                    <button type="submit" id="btnCrearIncidente" class="btn btn-primary">Crear incidente</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Editar incidente -->
<div class="modal fade" id="modalEditarIncidente">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo incidente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <!-- Titulo incidente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-plus"></i></div>
                            </div>
                            <input type="text" class="form-control" name="editarTitulo" id="editarTitulo" placeholder="Ingrese su nombre del incidente">
                            <input type="hidden" id="idActual" name="idActual">
                        </div>
                    </div>

                    <!-- tipo incidente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-list-ul"></i></div>
                            </div>
                            <select class="form-control input-lg" name="editarTipoIncidente">
                                <option id="editarTipoIncidente" value="">Seleccione una opción</option>
                                <?php
                                // foreach para rellenar la tabla de roles
                                foreach ($tipoIncidentes as $key => $tipoIncidente) {
                                    echo '<option value="' . $tipoIncidente["id_tipo_incidente"] . '">' . $tipoIncidente["nombre_tipo_incidente"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- afectado -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-list-ul"></i></div>
                            </div>
                            <select class="form-control input-lg" name="editarAfectado">
                                <option id="editarAfectado" value="">Seleccione una opción</option>
                                <?php
                                // foreach para rellenar la tabla de roles
                                foreach ($usuarios as $key => $usuario) {
                                    echo '<option value="' . $usuario["id_usuario"] . '">' . $usuario["nombre_usuario"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Comentarios -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <textarea class="form-control" name="editarComentario" id="editarComentario" rows="5" id="comment"></textarea>
                        </div>
                    </div>

                    <!-- div de errores -->
                    <div class="form-group" id="errorValidacionEditar">
                    </div>

                    <button type="submit" id="btnEditarIncidente" class="btn btn-primary">Editar incidente</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- JS modulo incidentes -->
<script src="view/js/incidentes.js"></script>

<?php
// controller: registrar incidente
$regIncidente = new ControllerIncidentes();
$regIncidente->controllerRegistrarIncidente();

// controller: editar incidente
$editIncidente = new ControllerIncidentes();
$editIncidente->controllerEditarIncidente();

// controller: eliminar incidente
$elimIncidente = new ControllerIncidentes();
$elimIncidente->controllerEliminarIncidente();
?>