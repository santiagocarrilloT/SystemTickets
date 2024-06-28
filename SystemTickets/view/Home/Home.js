
$(document ).ready(function() {

    estadisticaEstado('Revision', '#revision_h');
    estadisticaEstado('Progreso', '#progreso_h');
    estadisticaEstado('Terminado', '#terminado_h');

    estadisticaTitulo('hardware', '#hardware_h');
    estadisticaTitulo('software', '#software_h');
});

function estadisticaEstado(estado, componente){
    $.ajax({
        url: "../../controller/ticket.php?op=estadistica",
        type: "post",
        dataType: "text",
        data: {estado: estado},
        success: function(data){
            if(data.trim() == ''){
                $(componente).text('0');
            }
            else{
                $(componente).text(data);
            }
        }
    }).fail(function(e){
        console.log(e.responseText);
    });
}
function estadisticaTitulo(titulo, componente){
    $.ajax({
        url: "../../controller/ticket.php?op=titulo_count",
        type: "post",
        dataType: "text",
        data: {titulo: titulo},
        success: function(data){
            if(data.trim() == ''){
                $(componente).text('0');
            }
            else{
                $(componente).text(data);
            }
        }
    }).fail(function(e){
        console.log(e.responseText);
    });
}