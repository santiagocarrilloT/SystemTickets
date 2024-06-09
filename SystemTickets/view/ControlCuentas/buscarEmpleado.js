$(document).ready(function() {
    $("#buscar_form").on("submit", function(e) {
        e.preventDefault();
        if (validarBuscarFormulario()) {
            buscarEmpleado();
        } else {
            Swal.fire({
                title: '¡ERROR!',
                text: 'Por favor, ingresa el correo del empleado.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });

    function validarBuscarFormulario() {
        return $("#buscar_emp").val() !== "";
    }

    function buscarEmpleado() {
        var formData = new FormData($("#buscar_form")[0]);
        $.ajax({
            url: "../../controller/empleado.php?op=buscar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                try {
                    var data = JSON.parse(response);
                    $("#bNombre_emp").val(data.nombre_emp);
                    $("#bApellido_emp").val(data.apellido_emp);
                    $("#bDni_emp").val(data.DNI_emp);
                    $("#bPhone_emp").val(data.phone_emp);
                    $("#bEmail_emp").val(data.email_emp);                
                    $("#bPassword_emp").val(data.password_emp);    
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                    console.log("Response received:", response);
                }
                limpiarFormularioBuscar();
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
            }
        });
    }

    function limpiarFormularioBuscar() {
        $("#buscar_form")[0].reset();
    }
});