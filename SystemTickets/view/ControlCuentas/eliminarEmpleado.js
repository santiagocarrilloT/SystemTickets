$(document).ready(function() {
    $("#btn_eliminar").on("click", function() {
        var correoEmpleado = $("#elim_correo").val();
        if (correoEmpleado !== "") {
            eliminaEmpleado();
        } else {
            Swal.fire({
                title: '¡ERROR!',
                text: 'Ingresa el correo del empleado',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });
});

function eliminaEmpleado() {
    var formData = new FormData($("#empleado_form")[0]);
    $.ajax({
        url: "../../controller/empleado.php?op=delete",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos) {
            Swal.fire({
                title: '¡Éxito!',
                text: 'Empleado eliminado correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
            limpiar();
        }
    });

}

function limpiar(){
    $("#elim_correo").val("");
}