$(document).ready(function() {
    $("#editar_form").on("submit", function(e) {
        e.preventDefault();
        if (validarEditarFormularioCli()) {
            editarCliente();
        } else {
            Swal.fire({
                title: '¡ERROR!',
                text: 'Por favor, completa todos los campos.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });

    function validarEditarFormularioCli() {
        return $("#bNombre_user").val() !== "" && $("#bApellido_user").val() !== "" && 
        $("#bDni_user").val() !== "" && $("#bPhone_user").val() !== "" && $("#bEmail_user").val() !== "" && 
        $("#bPassword_user").val() !== ""; 
    }

    function editarCliente() {
        var formData = new FormData($("#editar_form")[0]);        
        $.ajax({
            url: "../../controller/cliente.php?op=editar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Cuenta editada correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
                limpiarFormularioEditarCli();
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: '¡ERROR!',
                    text: 'Error al editar la cuenta.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    }

    function limpiarFormularioEditarCli() {
        $("#editar_form")[0].reset();
    }
});