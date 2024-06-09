$(document).ready(function() {
    $("#eliminar_form").on("submit", function(e) {
        e.preventDefault();
        if (validarEliminarFormulario()) {
            eliminarEmpleado();
        } else {
            Swal.fire({
                title: '¡ERROR!',
                text: 'Por favor, ingresa el correo del empleado.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });

    function validarEliminarFormulario() {
        return $("#elim_correo").val() !== "";
    }

    function eliminarEmpleado() {
        var formData = new FormData($("#eliminar_form")[0]);
        $.ajax({
            url: "../../controller/empleado.php?op=delete",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Cuenta eliminada correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
                limpiarFormularioEliminar();
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: '¡ERROR!',
                    text: 'Error al eliminar la cuenta.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    }

    function limpiarFormularioEliminar() {
        $("#eliminar_form")[0].reset();
    }
});