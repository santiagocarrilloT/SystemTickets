
//Acción para conseguir el valor de la fecha seleccionada
$(document).ready(function() {
    const guardarFecha = $('#getDayBtn');

    guardarFecha.on('click', function() {
        var calendar = $('td.day.active');
        var day = calendar.data('day');
        $('#fecha_vencimiento').val(day);
    });
});

//Función para realizar el llamada a funcion de editar o guardar
function init(){
    $("#ticket_form").on("submit", function(e){
        guardaryeditar(e);
    });
}

//Función para cargar el combo de prioridades
$(document).ready(function() {
    $.post("../../controller/prioridad.php?op=combo", function(data, status) {
        if (status === "success") {
            $('#estado_ticket').html(data);
        } else {
            console.error("Error en la solicitud: ", status);
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud: ", textStatus, errorThrown);
    });
});

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
    });
}

init();
