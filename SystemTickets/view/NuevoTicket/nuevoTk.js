//Función para realizar el llamada a funcion de editar o guardar
function init(){
    $("#ticket_form").on("submit", function(e){
        guardaryeditar(e);
    });
}

// Función para manejar la apertura del modal
function handleModal(response) {
    if (response.modal === "crearCuentaModal") {
        // Abrir el modal para crear una nueva cuenta
        $('#crearCuentaModal').modal('show');
    }
}

//Llamada a funciones de estados y fecha
$(document).ready(function() {
    mostrarFecha('#fecha_vencimiento');
    cargarEstados('#estado_ticket');
});

//Función para cargar el combo de prioridades
export function cargarEstados(componente){
    $.post("../../controller/prioridad.php?op=combo", function(data, status) {
        if (status === "success") {
            $(componente).html(data);
        } else {
            console.error("Error en la solicitud: ", status);
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud: ", textStatus, errorThrown);
    });
}

//Acción para conseguir el valor de la fecha seleccionada
export function mostrarFecha(componente){
    const guardarFecha = $('#getDayBtn');

    guardarFecha.on('click', function() {
        var calendar = $('td.day.active');
        var day = calendar.data('day');
        $(componente).val(day);
    });
}

//Función para guardar o editar tickets
/* function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#ticket_form")[0]);
    $.ajax({
        url: "../../controller/ticket.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response){
            // Si la respuesta incluye 'crearCuentaModal', abrir el modal para crear una nueva cuenta
            handleModal(response);

            // Si la respuesta incluye 'Error', mostrar mensaje de error. De lo contrario, mostrar mensaje de éxito.
            if (response.includes('Error')){
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error al insertar los datos',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
            else{
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Insertaste datos correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
                // Limpiar los campos del formulario después de una inserción exitosa
                $('#modelo_ticket').val("");
                $('#numserie_ticket').val("");
                $('#correo_cliente').val("");
                $('#fecha_vencimiento').val("");
                $('#estado_ticket').val("");
                $('#descripcion_ticket').val("");
                $('#titulo_ticket').val("");
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error("Error en la solicitud: ", textStatus, errorThrown);
        }
    });
} */
function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#ticket_form")[0]);
    $.ajax({
        url: "../../controller/ticket.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            if (datos.includes('Error')){
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error al insertar los datos',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
            else{
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Insertaste datos correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
                $('#modelo_ticket').val("");
                $('#numserie_ticket').val("");
                $('#correo_cliente').val("");
                $('#fecha_vencimiento').val("");
                $('#estado_ticket').val("");
                $('#descripcion_ticket').val("");
                $('#titulo_ticket').val("");
            }
        }
    }); 
}

init();
