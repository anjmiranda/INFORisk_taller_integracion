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
                    <th>Nombre</th>
                    <th>Alias</th>
                    <th>Foto</th>
                    <th>Rol</th>
                    <th>Ultima Conexión</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // método del controller que consulta todos los usuarios de la BBDD
                $columnaBD = null;
                $valorBD = null;
                $usuarios = ControllerUsuarios::controllerMostrarUsuarios($columnaBD, $valorBD);
                $rolesUsuario = ControllerRolesUsuario::controllerMostrarRolesUsuario($columnaBD, $valorBD);

                // foreach que permite el llenado automático de los usuarios en la tabla
                foreach ($usuarios as $key => $usuario) {
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
                        <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $usuario["id_usuario"] . '" data-toggle="modal" data-target="#modalEditarUsuario">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $usuario["id_usuario"] . '" fotoUsuario="' . $usuario["foto_usuario"] . '" aliasUsuario="' . $usuario["alias_usuario"] . '">
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

<!-- Modal Registrar Usuarios -->
<div class="modal fade" id="modalRegistrarUsuario">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <!-- Nombre usuario -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-plus"></i></div>
                            </div>
                            <input type="text" class="form-control" name="nuevoNombre" id="nuevoNombre" placeholder="Ingrese su nombre">
                        </div>
                    </div>

                    <!-- Alias usuario -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-plus"></i></div>
                            </div>
                            <input type="text" class="form-control" name="nuevoAlias" id="nuevoAlias" placeholder="Ingrese el alias">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" name="nuevoPassword1" id="nuevoPassword1" autocomplete="new-password" placeholder="Ingrese su password">
                        </div>
                    </div>

                    <!-- Password 2 -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="nuevoPassword2" autocomplete="new-password" placeholder="Reingrese su password">
                        </div>
                    </div>

                    <!-- Rol -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-list-ul"></i></div>
                            </div>
                            <select class="form-control input-lg" name="nuevoRol" id="nuevoRol">
                                <option value="">Seleccione una opción</option>
                                <?php
                                // foreach para rellenar la tabla de roles
                                foreach ($rolesUsuario as $key => $rol) {
                                    echo '<option value="' . $rol["id_rol_usuario"] . '">' . $rol["nombre_rol_usuario"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- div fotografía -->
                    <div class="form-group">
                        <div class="panel">Subir Foto</div>
                        <input type="file" name="nuevaFoto" id="nuevaFoto" class="nuevaFoto">
                        <p class="help-block">Peso máximo de la foto: 2 MB </p>
                        <img src="view/componentes/images/anonimo.jpg" alt="Anonimo" class="img-thumbnail previsualizar" width="150px">
                    </div>

                    <!-- div de errores -->
                    <div class="form-group" id="errorValidacion">
                    </div>

                    <button type="submit" id="btnCrearUsuario" class="btn btn-primary">Crear Usuario</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Editar Usuarios -->
<div class="modal fade" id="modalEditarUsuario">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <!-- Nombre usuario -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-plus"></i></div>
                            </div>
                            <input type="text" class="form-control" name="editarNombre" id="editarNombre">
                        </div>
                    </div>

                    <!-- Alias usuario -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-plus"></i></div>
                            </div>
                            <input type="text" class="form-control" name="editarAlias" id="editarAlias" readonly>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" name="editarPassword1" id="editarPassword1" autocomplete="new-password" placeholder="Ingrese su password">
                            <input type="hidden" id="passwordActual" name="passwordActual">
                        </div>
                    </div>

                    <!-- Password 2 -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="editarPassword2" autocomplete="new-password" placeholder="Reingrese su password">
                        </div>
                    </div>

                    <!-- Rol -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-list-ul"></i></div>
                            </div>
                            <select class="form-control input-lg" name="editarRol" id="editarRol">
                                <option value="null" id="editarRolOpt">Seleccione el rol</option>
                                <?php
                                // foreach para rellenar la tabla de roles
                                foreach ($rolesUsuario as $key => $rol) {
                                    echo '<option value="' . $rol["id_rol_usuario"] . '">' . $rol["nombre_rol_usuario"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- div fotografía -->
                    <div class="form-group">
                        <div class="panel">Subir Foto</div>
                        <input type="file" name="editarFoto" class="nuevaFoto">
                        <p class="help-block">Peso máximo de la foto: 2 MB </p>
                        <img src="view/componentes/images/anonimo.jpg" alt="Anonimo" class="img-thumbnail previsualizar" width="150px">
                        <input type="hidden" id="fotoActual" name="fotoActual">
                    </div>

                    <!-- div de errores -->
                    <div class="form-group" id="errorValidacionEditar">
                    </div>

                    <button type="submit" id="btnEditarUsuario" class="btn btn-primary">Editar Usuario</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>
<!-- Modal consultar Usuarios -->
<div class="modal fade" id="modalRegistrarUsuario">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="row">
                    <div class="col-xl-6">
                        <form action="" method="POST" role="form" enctype="multipart/form-data">
                            <!-- Nombre usuario -->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user-plus"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="nuevoNombre" id="nuevoNombre" placeholder="Ingrese su nombre">
                                </div>
                            </div>

                            <!-- Alias usuario -->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user-plus"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="nuevoAlias" id="nuevoAlias" placeholder="Ingrese el alias">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                                    </div>
                                    <input type="password" class="form-control" name="nuevoPassword1" id="nuevoPassword1" autocomplete="new-password" placeholder="Ingrese su password">
                                </div>
                            </div>

                            <!-- Password 2 -->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                                    </div>
                                    <input type="password" class="form-control" id="nuevoPassword2" autocomplete="new-password" placeholder="Reingrese su password">
                                </div>
                            </div>

                            <!-- Rol -->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-list-ul"></i></div>
                                    </div>
                                    <select class="form-control input-lg" name="nuevoRol" id="nuevoRol">
                                        <option value="">Seleccione una opción</option>
                                        <?php
                                        // foreach para rellenar la tabla de roles
                                        foreach ($rolesUsuario as $key => $rol) {
                                            echo '<option value="' . $rol["id_rol_usuario"] . '">' . $rol["nombre_rol_usuario"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>



                            <button type="submit" id="btnCrearUsuario" class="btn btn-primary">Crear Usuario</button>
                        </form>
                    </div>
                    <div class="col-xl-6">
                        <!-- div fotografía -->
                        <div class="form-group">
                            <div class="panel">Subir Foto</div>
                            <input type="file" name="nuevaFoto" id="nuevaFoto" class="nuevaFoto">
                            <p class="help-block">Peso máximo de la foto: 2 MB </p>
                            <img src="view/componentes/images/anonimo.jpg" alt="Anonimo" class="img-thumbnail previsualizar" width="150px">
                        </div>

                        <!-- div de errores -->
                        <div class="form-group" id="errorValidacion">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- JS modulo usuarios -->
<script src="view/js/usuarios.js"></script>

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