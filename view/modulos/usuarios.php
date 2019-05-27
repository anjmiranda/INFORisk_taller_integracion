<div class="container-fluid contenedor">
    <h1 class="mt-4">Usuarios</h1>
    <hr>
    <button type="button" class="btn btn-success">Agregar</button><br><br>
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
                    foreach($rolesUsuario as $key => $rol){
                        if($rol["id_rol_usuario"] == $usuario["rol_usuario_fk"]){
                            echo '<td>' . $rol["nombre_rol_usuario"] . '</td>';
                            break;
                        }
                    }

                    // ultima conexion
                    echo '<td>' . $usuario["ultimolog_usuario"] . '</td>';

                    // estado usuario
                    if ($usuario["estado_usuario"] != 0) {
                        echo '
                        <td>
                            <span class="label btn-success btn-xs btnActivar" idUsuario="" estadoUsuario="0">Activado</span>
                        </td>';
                    } else {
                        echo '
                        <td>
                            <span class="label btn-success btn-xs btnActivar" idUsuario="" estadoUsuario="0">Activado</span>
                        </td>';
                    }

                    // acciones de modificar o eliminar
                    echo '
                    <td>
                        <button class="btn btn-warning btnEditarUsuario" idUsuario="" data-toggle="modal" data-target="#modalEditarUsuario">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btnEditarUsuario" idUsuario="" data-toggle="modal" data-target="#modalEditarUsuario">
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