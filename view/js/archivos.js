$(document).ready(function(){
    var idUsuario = 10;

    $("#idUsuario").change(function(){
        //debugger;
        idUsuario = $("#idUsuario").val()
        var datos = new FormData();
        datos.append("idUsuario", idUsuario);

        $.ajax({
            url: "ajax/archivos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta){
                //console.log(respuesta);
                //debugger;

                $.each( respuesta, function( llave, objeto ) {
                    //console.log(llave + ": " + respuesta[llave]["id_registro"]);
                    if(objeto['ubicacion_archivo'] == null){
                        $('.cargar'+llave).attr('idRegistro', objeto["id_registro"]).attr('idArchivo', llave).attr('idUsuario', idUsuario).removeClass('disabled').attr('data-toggle', 'modal').attr('data-target', '#modaRegistrarArchivo');
                    }else{
                        $('.cargar'+llave).addClass('disabled').removeAttr('data-toggle', 'modal').removeAttr('data-target', '#modaRegistrarArchivo');
                        $('.descargar'+llave).attr('url', objeto["ubicacion_archivo"]).removeClass('disabled').attr('data-toggle', 'modal').attr('data-target', '#modalDescargarArchivo');
                        $('.modificar'+llave).attr('idRegistro', objeto["id_registro"]).attr('idArchivo', llave).attr('idUsuario', idUsuario).removeClass('disabled').attr('data-toggle', 'modal').attr('data-target', '#modalEditarArchivo');
                        $('.eliminar'+llave).attr('idRegistro', objeto["id_registro"]).attr('idArchivo', llave).attr('idUsuario', idUsuario).removeClass('disabled');
                    }
                });
            }
        });
    })

    // funcion que permite heredar al formulario de agrega y modificar archivo los valores de usuario y tipo de archivo
    $('.botones').click(function(){
        var usuario = $(this).attr("idUsuario");
        var archivo = $(this).attr("idArchivo");
        var registro = $(this).attr("idRegistro");
        var url = $(this).attr("url");
        
        // herencia de los valores a los formularios para subir archivo
        $('#upld_usuario').val(usuario);
        $('#upld_archivo').val(archivo);
        $('#upld_registro').val(registro);
        $('#descargarUrl').attr("href", url);
        $('#descargarUrl').attr("download", "documento");

        // herencia de los valores a los formularios para editar
        $('#edit_usuario').val(usuario);
        $('#edit_archivo').val(archivo);
        $('#edit_registro').val(registro);

        // herencia de los valores a los formularios para eliminar
        $('#elim_usuario').val(usuario);
        $('#elim_archivo').val(archivo);
        $('#elim_registro').val(registro);
    });

    $("#registrarArchivo").change(function () {
        var archivo = this.files[0];
        var extension = archivo['name'].substr(archivo['name'].lastIndexOf('.')+1);

        // verificar que la imagen solo sea JPEG o PNG
        if (extension != "pdf") {
            //limpiar la variable
            $(".registrarArchivo").val("");
    
            swal({
                title: "Error al subir el archivo",
                text: "El archivo solo puede ser formato pdf",
                type: "error",
                confirmButtonText: "cerrar"
            });
        } else if (archivo["size"] > 20000000) {
            // verificar que archivo no sea superior a 20.000.000 -> 20 mb
    
            //limpiar la variable
            $(".registrarArchivo").val("");
    
            // mensaje de error
            swal({
                title: "Error al subir el archivo",
                text: "El archivo no puede pesar mas de 20mb",
                type: "error",
                confirmButtonText: "cerrar"
            });
        }
    });

    $("#editarArchivo").change(function () {
        var archivo = this.files[0];
        var extension = archivo['name'].substr(archivo['name'].lastIndexOf('.')+1);

        // verificar que la imagen solo sea JPEG o PNG
        if (extension != "pdf") {
            //limpiar la variable
            $(".editarArchivo").val("");
    
            swal({
                title: "Error al subir el archivo",
                text: "El archivo solo puede ser formato pdf",
                type: "error",
                confirmButtonText: "cerrar"
            });
        } else if (archivo["size"] > 20000000) {
            // verificar que archivo no sea superior a 20.000.000 -> 20 mb
    
            //limpiar la variable
            $(".editarArchivo").val("");
    
            // mensaje de error
            swal({
                title: "Error al subir el archivo",
                text: "El archivo no puede pesar mas de 20mb",
                type: "error",
                confirmButtonText: "cerrar"
            });
        }
    })

    $(document).on("click", "#btnEliminarArchivo", function(){

        if($('#elim_registro').val() != ""){
            // variables de id y ubicación de fotos
            var idUsuario = $('#elim_usuario').val();
            var idArchivo = $('#elim_archivo').val();
            var idRegistro = $('#elim_registro').val();
        
            swal({
                title              : '¿Está seguro que desea eliminar el archivo?',
                type               : 'warning',
                showCancelButton   : true,
                confirmButtonColor : '#3085D6',
                cancelButtonColor  : '#D33',
                cancelButtonText   : 'Cancelar',
                confirmButtonText  : 'Borrar'
            }).then((result)=>{
                if(result.value){
                    // envío de parametros por GET - idUsuario + fotoUsuario para eliminiar el usuario 
                    window.location = "index.php?ruta=archivos&idUsuario="+idUsuario+"&idArchivo="+idArchivo+"&idRegistro="+idRegistro;
                }
            })
        }
    })
});