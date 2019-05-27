//___________________________________________________________________________________________________________
// VALIDACIONES
//___________________________________________________________________________________________________________
// funcion dinámica que verifica el tamaño del la imagen en el input file (Usuarios, clientes, empresas)
$(".nuevaFoto").change(function () {
    var imagen = this.files[0];

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "la imagen debe estar en formato JPG o PNG",
            type: "error",
            confirmButtonText: "cerrar"
        });
    } else if (imagen["size"] > 2000000) {
        // 2.000.000 -> 2 mb

        //limpiar la variable
        $(".nuevaFoto").val("");

        // mensaje de error
        swal({
            title: "Error al subir la imagen",
            text: "la imagen no debe pesar mas de 2 MB",
            type: "error",
            confirmButtonText: "cerrar"
        });
    }
    else {
        // clase para hacer lectura de archivo
        var datosImagen = new FileReader;
        // leer como archivo url
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load", function (event) {
            // ruta para la imagen
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen)
        })
    }
})
//___________________________________________________________________________________________________________

//___________________________________________________________________________________________________________
// funcion parar validar formulario en Crear Usuario (preventDefault())
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