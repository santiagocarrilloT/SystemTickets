$(document).ready(function() {
    $("#empleado_form").on("submit", function(e) {
        e.preventDefault();
        if (validarCrearFormulario()) {
            crearEmpleado();
        } else {
            Swal.fire({
                title: '¡ERROR!',
                text: 'Por favor, completa todos los campos.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });

    function validarCrearFormulario() {
        return $("#nombre_emp").val() !== "" && $("#apellido_emp").val() !== "" &&
            $("#DNI_emp").val() !== "" && $("#phone_emp").val() !== "" &&
            $("#email_emp").val() !== "" && $("#password_emp").val() !== "";
    }

    function crearEmpleado() {
        var formData = new FormData($("#empleado_form")[0]);
        $.ajax({
            url: "../../controller/empleado.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Cuenta creada correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
                limpiarFormularioCrear();
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: '¡ERROR!',
                    text: 'Error al crear la cuenta.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    }

    function limpiarFormularioCrear() {
        $("#empleado_form")[0].reset();
    }
});