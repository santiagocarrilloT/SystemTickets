
function init(){

}

$(document).ready(function(){
    $.ajax({
        url: "../../controller/ticket.php?op=listar_tickets",
        type: "post",
        dataType: "json",
        success: function(data){
            const tabla = data.aaData
            tabla.forEach(ticket => {
                var row = '<tr>' +
                            '<td>' + ticket.id_ticket + '</td>' +
                            '<td>' + ticket.numserie_ticket + '</td>' +
                            '<td>' + ticket.titulo_ticket + '</td>' +
                            '<td>' + ticket.fecha_vencimiento + '</td>' +
                            '<td>' + ticket.estado_ticket + '</td>' +
                            '<td>' + ticket.correo_cliente + '</td>' +
                            '<td><a href="../Home/" class="btn btn-warning m-1" id="'+ticket.id_ticket+'" style="margin: 2px;">Editar</a></td>' +
                            '</tr>';
                $('#ticket_data tbody').append(row);
            });
        }
    });
});
init();