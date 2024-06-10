$(document).ready(function() {
    $("#cliente_form").on("submit", function(e) {
        e.preventDefault();
        if (validarCrearFormulario()) {
            crearCliente();
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
        return $("#nombre_user").val() !== "" && $("#apellido_user").val() !== "" &&
            $("#DNI_user").val() !== "" && $("#phone_user").val() !== "" &&
            $("#email_user").val() !== "" && $("#password_user").val() !== "";
    }

    function crearCliente() {
        var formData = new FormData($("#cliente_form")[0]);
        $.ajax({
            url: "../../controller/cliente.php?op=insert",
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
        $("#cliente_form")[0].reset();
    }
});