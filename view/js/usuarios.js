//___________________________________________________________________________________________________________
// VALIDACIONES

$(document).ready(function() {
  //___________________________________________________________________________________________________________
  // funcion parar validar formulario en Crear Usuario opción preventDefault())
  $("#btnCrearUsuario").click(function(event) {
    // validar nombre
    var nuevoNombre = $("#nuevoNombre").val();
    if (nuevoNombre == "") {
      event.preventDefault();
      $("#errorValidacion").html(
        '<div class="alert alert-danger alert-dismissible">El nombre no puede estar vacio</div>'
      );
    }
    // validar usuario
    var nuevoUsuario = $("#nuevoAlias").val();
    if (nuevoUsuario == "") {
      event.preventDefault();
      $("#errorValidacion").html(
        '<div class="alert alert-danger alert-dismissible">El usuario no puede estar vacio</div>'
      );
    }

    // validar contraseñas
    var nuevoPassword1 = $("#nuevoPassword1").val();
    var nuevoPassword2 = $("#nuevoPassword2").val();

    if (nuevoPassword1 != nuevoPassword2) {
      event.preventDefault();
      $("#errorValidacion").html(
        '<div class="alert alert-danger alert-dismissible">Las contraseñas no coinciden</div>'
      );
    } else if (nuevoPassword1 == "") {
      event.preventDefault();
      $("#errorValidacion").html(
        '<div class="alert alert-danger alert-dismissible">La contraseña no puede estar vacia</div>'
      );
    }

    // validar si el select existe [USUARIO]
    if ($("#nuevoPerfil").length > 0) {
      // validar select empresa
      var nuevoPerfil = $("#nuevoPerfil").val();
      if (nuevoPerfil == "") {
        event.preventDefault();
        $("#errorValidacion").html(
          '<div class="alert alert-danger alert-dismissible">Debe seleccionar un perfil</div>'
        );
      }
    }
  });
  //___________________________________________________________________________________________________________

  //___________________________________________________________________________________________________________
  // funcion parar validar formulario en editar Usuario (preventDefault())
  $("#btnEditarUsuario").click(function(event) {
    // validar nombre
    var editarNombre = $("#editarNombre").val();
    if (editarNombre == "") {
      event.preventDefault();
      $("#errorValidacion").html(
        '<div class="alert alert-danger alert-dismissible">El nombre no puede estar vacio</div>'
      );
    }

    // validar contraseñas
    var editarPassword1 = $("#editarPassword1").val();
    var editarPassword2 = $("#editarPassword2").val();

    if (editarPassword1 != "" && editarPassword1 != editarPassword2) {
      event.preventDefault();
      $("#errorEditarUsuario").html(
        '<div class="alert alert-danger alert-dismissible">Las contraseñas no coinciden</div>'
      );
    }
  });
  //___________________________________________________________________________________________________________
  // AJAX
  //___________________________________________________________________________________________________________
  // funcion ajax que permite mostrar los datos desde una BBDD al modal de forma dinámica
  $(document).on("click", ".btnEditarUsuario", function() {
    var idUsuario = $(this).attr("idUsuario");
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);
    $.ajax({
      url: "ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {
        // procesamiento de los datos que vienen de la BBDD
        $("#editarNombre").val(respuesta["nombre_usuario"]);
        $("#editarUsuario").val(respuesta["usuario_tipo"]);
        $("#editarPerfil").html(respuesta["perfil_usuario"]);

        // mantener perfil en caso que no se edite
        $("#editarPerfil").val(respuesta["perfil_usuario"]);

        // mantener password en caso que no se modifique
        $("#passwordActual").val(respuesta["password_usuario"]);

        if (respuesta["foto_usuario"] != "") {
          $(".previsualizar").attr("src", respuesta["foto_usuario"]);
        }

        // mantener foto en caso que no se modifique
        $("#fotoActual").val(respuesta["foto_usuario"]);
      }
    });
  });
  //___________________________________________________________________________________________________________
});
