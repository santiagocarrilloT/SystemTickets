function init(){
    $("#empleado_form").on("submit", function(e){
        console.log("Enviando formulario...");
        guardaryeditarE(e);
    });
}

function guardaryeditarE(e){
    console.log("Enviando formulario...");
    e.preventDefault();
    var formData = new FormData($("#empleado_form")[0]);
    $.ajax({
        url: "../../controller/empleado.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
        }
    });
    limpiar(e);
}

init();

//funcion para limpiar los campos despues de crear un usuario nuevo
function limpiar(e){
    $("#nombre_emp").val("");
    $("#apellido_emp").val("");
    $("#DNI_emp").val("");
    $("#phone_emp").val("");
    $("#email_emp").val("");
    $("#password_emp").val("");
}
