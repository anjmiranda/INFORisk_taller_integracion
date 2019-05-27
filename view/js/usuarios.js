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