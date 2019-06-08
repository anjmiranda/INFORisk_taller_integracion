<div id="ingreso">
    <div class="contelogin">
        <form id="form2" method="POST">
            <h1>INFORisk</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><strong>Usuario</strong></span>
                    <input type="text" name="nombreUsuario" class="form-control" placeholder="Ingrese su usuario" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><strong>Contraseña</strong></span>
                    <input type="password" name="passUsuario" class="form-control" placeholder="Ingrese su password" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-info">ingresar</button>
                <button type="button" class="btn btn-info">cancelar</button>
            </div>

            <?php
            // inicio de sesión
            $loginUsuario = new ControllerUsuarios();
            $loginUsuario->controllerIngresarUsuario();
            ?>

        </form>
    </div>
</div>