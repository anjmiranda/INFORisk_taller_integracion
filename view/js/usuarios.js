//___________________________________________________________________________________________________________
// VALIDACIONES
//___________________________________________________________________________________________________________
// funcion parar validar formulario en Crear Usuario opción preventDefault())
$("#btnCrearUsuario").click(function (event) {

    // validar nombre
    var nuevoNombre = $("#nuevoNombre").val();
    if (nuevoNombre == "") {
        event.preventDefault();
        $('#errorValidacion').html('<div class="alert alert-danger alert-dismissible">El nombre no puede estar vacio</div>');
    }
    // validar usuario
    var nuevoUsuario = $("#nuevoAlias").val();
    if (nuevoUsuario == "") {
        event.preventDefault();
        $('#errorValidacion').html('<div class="alert alert-danger alert-dismissible">El usuario no puede estar vacio</div>');
    }

    // validar contraseñas
    var nuevoPassword1 = $("#nuevoPassword1").val();
    var nuevoPassword2 = $("#nuevoPassword2").val();

    if (nuevoPassword1 != nuevoPassword2) {
        event.preventDefault();
        $('#errorValidacion').html('<div class="alert alert-danger alert-dismissible">Las contraseñas no coinciden</div>');
    } else if (nuevoPassword1 == "") {
        event.preventDefault();
        $('#errorValidacion').html('<div class="alert alert-danger alert-dismissible">La contraseña no puede estar vacia</div>');
    }

    // validar si el select existe [USUARIO]
    if ($("#nuevoPerfil").length > 0) {
        // validar select empresa
        var nuevoPerfil = $("#nuevoPerfil").val();
        if (nuevoPerfil == "") {
            event.preventDefault();
            $('#errorValidacion').html('<div class="alert alert-danger alert-dismissible">Debe seleccionar un perfil</div>');
        }
    }
})
//___________________________________________________________________________________________________________