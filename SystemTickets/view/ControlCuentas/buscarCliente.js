$(document).ready(function() {
    $("#buscar_form").on("submit", function(e) {
        e.preventDefault();
        if (validarBuscarFormularioCli()) {
            buscarCliente();
        } else {
            Swal.fire({
                title: '¡ERROR!',
                text: 'Por favor, ingresa el correo del cliente.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });

    function validarBuscarFormularioCli() {
        return $("#buscar_user").val() !== "";
    }

    function buscarCliente() {
        var formData = new FormData($("#buscar_form")[0]);
        $.ajax({
            url: "../../controller/cliente.php?op=buscar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                try {
                    var data = JSON.parse(response);
                    $("#bNombre_user").val(data.nombre_user);
                    $("#bApellido_user").val(data.apellido_user);
                    $("#bDni_user").val(data.DNI_user);
                    $("#bPhone_user").val(data.phone_user);
                    $("#bEmail_user").val(data.email_user);                
                    $("#bPassword_user").val(data.password_user);    
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                    console.log("Response received:", response);
                }
                limpiarFormularioBuscarCli();
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
            }
        });
    }

    function limpiarFormularioBuscarCli() {
        $("#buscar_form")[0].reset();
    }
});