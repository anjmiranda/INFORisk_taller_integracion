<div class="container-fluid contenedor">
    <h1 class="mt-4">Registro de accidentes</h1>
    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistrarUsuario">Agregar</button><br>
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
                // método del controller que consulta todos los usuarios de la BBDD
                $columnaBD = null;
                $valorBD = null;
                $usuarios = ControllerUsuarios::controllerMostrarUsuarios($columnaBD, $valorBD);
                $tipoIncidentes = ControllerTiposIncidentes::controllerMostrarTiposIncidentes($columnaBD, $valorBD);

                // foreach que permite el llenado automático de los usuarios en la tabla
                /*foreach ($usuarios as $key => $usuario) {
                    // id, nombre y alias
                    echo '
                        <tr>
                        <td>' . $usuario["id_usuario"] . '</td>
                        <td>' . $usuario["nombre_usuario"] . '</td>
                        <td>' . $usuario["alias_usuario"] . '</td>';

                    // foto del usuario si muestra la información o no
                    if ($usuario["foto_usuario"] != null) {
                        echo
                            '<td>
                              <img src="' . $usuario["foto_usuario"] . '" class="img-thumbnail" width="40px" alt="Usuario">
                            </td>';
                    } else {
                        echo
                            '<td>
                              <img src="view/componentes/images/anonimo.jpg" class="img-thumbnail" width="40px" alt="Usuario">
                            </td>';
                    }
                    // rol usuario / foreach para recorrer la lista de roles
                    foreach ($rolesUsuario as $key => $rol) {
                        if ($rol["id_rol_usuario"] == $usuario["rol_usuario_fk"]) {
                            echo '<td>' . $rol["nombre_rol_usuario"] . '</td>';
                            break;
                        }
                    }

                    // ultima conexion
                    echo '<td>' . $usuario["ultimolog_usuario"] . '</td>';

                    // estado usuario
                    if ($usuario["estado_usuario"] == 1) {
                        echo '
                        <td>
                            <span class="btnEditarUsuario label btn-success btn-xs btnActivar" idUsuario="' . $usuario["id_usuario"] . '" estadoUsuario="2">Activado</span>
                        </td>';
                    } else if ($usuario["estado_usuario"] == 2) {
                        echo '
                        <td>
                            <span class="btnEditarUsuario label btn-danger btn-xs btnActivar" idUsuario="' . $usuario["id_usuario"] . '" estadoUsuario="1">Desactivado</span>
                        </td>';
                    }

                    // acciones de modificar o eliminar
                    echo '
                    <td>
                        <button class="btn btn-success btnConsultarUsuario" idUsuario="' . $usuario["id_usuario"] . '" data-toggle="modal" data-target="#modalConsultarUsuario">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $usuario["id_usuario"] . '" data-toggle="modal" data-target="#modalEditarUsuario">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $usuario["id_usuario"] . '" fotoUsuario="' . $usuario["foto_usuario"] . '" aliasUsuario="' . $usuario["alias_usuario"] . '">
                          <i class="fas fa-user-times"></i>
                        </button>
                    </td>
                    </tr>';
                }*/
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
<div class="modal fade" id="modalRegistrarUsuario">
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
                        </div>
                    </div>

                    <!-- tipo incidente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-list-ul"></i></div>
                            </div>
                            <select class="form-control input-lg" name="editarTipoIncidente" id="editarTipoIncidente">
                                <option value="">Seleccione una opción</option>
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
                            <select class="form-control input-lg" name="editarAfectado" id="editarAfectado">
                                <option value="">Seleccione una opción</option>
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
// controller: registrar usuario
//$regUsuario = new ControllerUsuarios();
//$regUsuario->controllerRegistrarUsuario();

// controller: editar usuario
//$editUsuario = new ControllerUsuarios();
//$editUsuario->controllerEditarUsuario();

// controller: eliminar usuario
//$elimUsuario = new ControllerUsuarios();
//$elimUsuario->controllerEliminarUsuario();
?>