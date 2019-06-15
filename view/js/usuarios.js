//___________________________________________________________________________________________________________
// VALIDACIONES

$(document).ready(function () {
  //___________________________________________________________________________________________________________
  // funcion parar validar formulario en Crear Usuario opción preventDefault())
  $("#btnCrearUsuario").click(function (event) {
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
  $("#btnEditarUsuario").click(function (event) {
    // validar nombre
    var editarNombre = $("#editarNombre").val();
    if (editarNombre == "") {
      event.preventDefault();
      $("#errorValidacionEditar").html(
        '<div class="alert alert-danger alert-dismissible">El nombre no puede estar vacio</div>'
      );
    }

    // validar contraseñas
    var editarPassword1 = $("#editarPassword1").val();
    var editarPassword2 = $("#editarPassword2").val();

    if (editarPassword1 != "" && editarPassword1 != editarPassword2) {
      event.preventDefault();
      $("#errorValidacionEditar").html(
        '<div class="alert alert-danger alert-dismissible">Las contraseñas no coinciden</div>'
      );
    }
  });
  //___________________________________________________________________________________________________________

  //___________________________________________________________________________________________________________
  //  método que permite eliminar usuario
  $(document).on("click", ".btnEliminarUsuario", function () {
    debugger;
    // variables de id y ubicación de fotos
    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var aliasUsuario = $(this).attr("aliasUsuario");

    swal({
      title: '¿Está seguro que desea eliminar este usuario?',
      text: 'es preferible desactivar el usuario',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085D6',
      cancelButtonColor: '#D33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Borrar'
    }).then((result) => {
      if (result.value) {
        // envío de parametros por GET - idUsuario + fotoUsuario para eliminiar el usuario 
        window.location = "index.php?ruta=usuarios&idUsuario=" + idUsuario + "&fotoUsuario=" + fotoUsuario + "&aliasUsuario=" + aliasUsuario;
      }
    })
  })
  //___________________________________________________________________________________________________________
  // AJAX
  //___________________________________________________________________________________________________________
  // funcion ajax que permite mostrar los datos desde una BBDD al modal de forma dinámica
  $(document).on("click", ".btnEditarUsuario", function () {
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
      success: function (respuesta) {
        // procesamiento de los datos que vienen de la BBDD
        $("#editarNombre").val(respuesta["nombre_usuario"]);
        $("#editarAlias").val(respuesta["alias_usuario"]);
        $("#editarPerfil").html(respuesta["perfil_usuario"]);

        // mantener password en caso que no se modifique
        $("#passwordActual").val(respuesta["password_usuario"]);

        // mantener perfil en caso que no se edite
        $("#editarRolOpt").val(respuesta["rol_usuario_fk"]);

        if (respuesta["foto_usuario"] != "") {
          $(".previsualizar").attr("src", respuesta["foto_usuario"]);
        }

        // mantener foto en caso que no se modifique
        $("#fotoActual").val(respuesta["foto_usuario"]);
      }
    });
  });
  //___________________________________________________________________________________________________________

  //___________________________________________________________________________________________________________
  // AJAX método que permite verificar si hay usuarios registrados para evitar id repetidos
  // esto evitará que los directorios de los usuarios sean únicos e irrepetibles
  $("#nuevoAlias").change(function () {

    // limpiar mensajes de alerta
    $(".alert").remove();

    var usuario = $(this).val();
    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
      url: "ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        if (respuesta) {
          // si no encuentra un match, la respuesta vendrá false por lo tanto no hará nada
          $("#nuevoAlias").parent().after('<div class="alert alert-danger alert-dismissible">Este usuario ya existe en la base de datos</div>');
          $("#nuevoAlias").val("");
        }
      }
    })
  })
  //___________________________________________________________________________________________________________

  //___________________________________________________________________________________________________________
  // AJAX método que permite activar o desactivar usuarios
  $(document).on("click", ".btnActivar", function () {
    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({

      url: "ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {
        
      }
      
    })
    // si estado usuario es 2, quiere decir que está activado y se desea desactivar
    if (estadoUsuario == 2) {
      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoUsuario', 1);
    } else {
      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoUsuario', 2)
    }
  })
  //___________________________________________________________________________________________________________
});


