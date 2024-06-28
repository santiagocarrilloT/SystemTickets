// Fnncion que permite filtrar los tickets por diferentes criterios (Llamado al final)
function init(){
    $("#busqueda_form").on("submit", function(e){
        if ($("#valor").val() == ""){
            cargarSinFiltroCliente();
        }else{
            cargarTicketsCli(e);
        }
        
    });
}


//Lista los tickets sin filtrar
$(document).ready(function(){
    console.log("Hola");
    cargarSinFiltroCliente();

    $('#ticket_data tbody').on('click', '.view-btn', function() {
        var id = $(this).attr('id');
        $('#modalTicket').modal('show');
        detallesTicket(id);
    });

    $('#cerrarModal').on('click', function() {
        $('#modalTicket').modal("hide");
    });
});

function cargarSinFiltroCliente(){
    $.ajax({
        url: "../../controller/cliente.php?op=listar_tickets",
        type: "post",
        dataType: "json",
        success: function(data){
            data.aaData.forEach(ticket => {
                var row = '<tr>' +
                            '<td>' + ticket.id_ticket + '</td>' +
                            '<td>' + ticket.numserie_ticket + '</td>' +
                            '<td>' + ticket.titulo_ticket + '</td>' +
                            '<td>' + ticket.fecha_vencimiento + '</td>' +
                            '<td>' + ticket.estado_ticket + '</td>' +
                            '<td>' + ticket.correo_cliente + '</td>' +                            
                            '<td class="text-center"><button type="submit" value="'+ticket.id_ticket+'" class="btn btn-info m-1 view-btn" id="'+ticket.id_ticket+'"><i class="fa fa-list"></i></button></td>' +
                            '</tr>';
                $('#ticket_data tbody').append(row);
            });
        }
    }).fail(function(e){
        console.log(e.responseText);
    });

}

//Función para mostrar el detalle del ticket
function detallesTicket(id_ticket){
    console.log(id_ticket);
    $.ajax({
        url: "../../controller/cliente.php?op=obtener_ticket",
        type: "post",
        dataType: "json",
        data: {ticket_id: id_ticket},
        success: function(data){
            data.aaData.forEach(ticket => {
                $("#detalle_modelo").val(ticket.modelo_ticket);
                $("#detalle_numserie").val(ticket.numserie_ticket);
                $("#detalle_correo").val(ticket.correo_cliente);
                $("#detalle_vencimiento").val(ticket.fecha_vencimiento);
                $("#detalle_estado").val(ticket.estado_ticket);
                $("#detalle_titulo").val(ticket.titulo_ticket);
                $("#detalle_descripcion").val(ticket.descripcion_ticket);
                $("#detalle_entrega").val(ticket.fecha_creacion);
                $("#detalle_creador").val(ticket.user_create);
            });
        }
    }).fail(function(e){
        console.log(e.responseText);
    });
    
}

//Función para cargar los tickets sin filtro
function cargarSinFiltro(){
    $.ajax({
        url: "../../controller/cliente.php?op=listar_tickets",
        type: "post",
        dataType: "json",
        success: function(data){
            data.aaData.forEach(ticket => {
                var row = '<tr>' +
                            '<td>' + ticket.id_ticket + '</td>' +
                            '<td>' + ticket.numserie_ticket + '</td>' +
                            '<td>' + ticket.titulo_ticket + '</td>' +
                            '<td>' + ticket.fecha_vencimiento + '</td>' +
                            '<td>' + ticket.estado_ticket + '</td>' +
                            '<td>' + ticket.correo_cliente + '</td>' +                            
                            '<td class="text-center"><button type="submit" value="'+ticket.id_ticket+'" class="btn btn-info m-1 view-btn" id="'+ticket.id_ticket+'"><i class="fa fa-list"></i></button></td>' +
                            '</tr>';
                $('#ticket_data tbody').append(row);
            });
        }
    });
}

//Función para cargar los tickets filtrados
function cargarTicketsCli(e){
    e.preventDefault();
    const formData = new FormData($("#busqueda_form")[0]);

    //Filtrar los tickets y mostrarlos en la tabla
    $.ajax({
        url: "../../controller/cliente.php?op=filtrar_tickets",
        type: "post",
        dataType: "json",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            $('#ticket_data tbody').empty();
            data.aaData.forEach(ticket => {
                var row = '<tr>' +
                            '<td>' + ticket.id_ticket + '</td>' +
                            '<td>' + ticket.numserie_ticket + '</td>' +
                            '<td>' + ticket.titulo_ticket + '</td>' +
                            '<td>' + ticket.fecha_vencimiento + '</td>' +
                            '<td>' + ticket.estado_ticket + '</td>' +
                            '<td>' + ticket.correo_cliente + '</td>' +                            
                            '<td class="text-center"><button type="submit" value="'+ticket.id_ticket+'" class="btn btn-info m-1 view-btn" id="'+ticket.id_ticket+'"><i class="fa fa-list"></i></button></td>' +
                            '</tr>';
                $('#ticket_data tbody').append(row);
            });

            //Limpiar el formulario
            $('#valor').val("");
        }
    }).fail(function(e){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se encontraron tickets con los criterios de búsqueda ingresados',
        });
    });
    
}
init();