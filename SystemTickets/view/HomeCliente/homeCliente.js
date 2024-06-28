$(document ).ready(function() {

    estadisticaEstadoCli('Revision', '#revision_h');
    estadisticaEstadoCli('Progreso', '#progreso_h');
    estadisticaEstadoCli('Terminado', '#terminado_h');

    estadisticaTituloCli('hardware', '#hardware_h');
    estadisticaTituloCli('software', '#software_h');
});

function estadisticaEstadoCli(estado, componente){
    $.ajax({
        url: "../../controller/cliente.php?op=estadistica_cli",
        type: "post",
        dataType: "text",
        data: {estado_cli: estado},
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
function estadisticaTituloCli(titulo, componente){
    $.ajax({
        url: "../../controller/cliente.php?op=titulo_count_cli",
        type: "post",
        dataType: "text",
        data: {titulo_cli: titulo},
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