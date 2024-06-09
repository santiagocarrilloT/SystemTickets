import { cargarEstados, mostrarFecha } from "../NuevoTicket/nuevoTk.js";

function init(){
    $("#edit_form").on("submit", function(e){
        actualizarTicket(e);
    });
}

$(document).ready(function() {
    cargarEstados('#edit_estado');
    mostrarFecha('#edit_vencimiento');
});

$(document).ready(function(){
    const formData = new FormData($("#edit_form")[0]);
    $.ajax({
        url: "../../controller/ticket.php?op=obtener_ticket",
        type: "post",
        dataType: "json",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            data.aaData.forEach(ticket => {
                $("#edit_modelo").val(ticket.modelo_ticket);
                $("#edit_numserie").val(ticket.numserie_ticket);
                $("#edit_correo").val(ticket.correo_cliente);
                $("#edit_vencimiento").val(ticket.fecha_vencimiento);
                $("#estado_anterior").val(ticket.estado_ticket);
                $("#edit_titulo").val(ticket.titulo_ticket);
                $("#edit_descripcion").val(ticket.descripcion_ticket); 
            });
        }
    }).fail(function(e){
        console.log(e.responseText);
    });
});

function actualizarTicket(e){
    e.preventDefault();
    const formData = new FormData($("#edit_form")[0]);
    $.ajax({
        url: "../../controller/ticket.php?op=editar_ticket",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            if (datos.includes('Error')){
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error al actualizar los datos',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
            else{
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Actualizaste datos correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
                $('#edit_modelo').val("");
                $('#edit_numserie').val("");
                $('#edit_correo').val("");
                $('#edit_vencimiento').val("");
                $('#edit_estado').val("");
                $('#edit_titulo').val("");
                $('#edit_descripcion').val("");
            }
        }
    });
}

init();