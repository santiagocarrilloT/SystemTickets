$(document).ready(function() {
    $("#editar_form").on("submit", function(e) {
        e.preventDefault();
        if (validarEditarFormulario()) {
            editarEmpleado();
        } else {
            Swal.fire({
                title: '¡ERROR!',
                text: 'Por favor, completa todos los campos.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });

    function validarEditarFormulario() {
        return $("#bNombre_emp").val() !== "" && $("#bApellido_emp").val() !== "" && 
        $("#bDni_emp").val() !== "" && $("#bPhone_emp").val() !== "" && $("#bEmail_emp").val() !== "" && 
        $("#bPassword_emp").val() !== ""; 
    }

    function editarEmpleado() {
        var formData = new FormData($("#editar_form")[0]);        
        $.ajax({
            url: "../../controller/empleado.php?op=editar",
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
                limpiarFormularioEditar();
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

    function limpiarFormularioEditar() {
        $("#editar_form")[0].reset();
    }
});