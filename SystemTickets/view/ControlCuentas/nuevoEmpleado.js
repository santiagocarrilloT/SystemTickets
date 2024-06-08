function init(){
    $("#empleado_form").on("submit", function(e){
        e.preventDefault();
        if(validarFormulario()){
            console.log("Enviando formulario...");
            guardaryeditarE(e);
        } else {
            Swal.fire({
                title: '¡ERROR!',
                text: 'Ingresa informacion en todos los campos',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });
}

function validarFormulario(){
    if($("#nombre_emp").val() === "" ||
        $("#apellido_emp").val() === "" ||
        $("#DNI_emp").val() === "" ||
        $("#phone_emp").val() === "" ||
        $("#email_emp").val() === "" ||
        $("#password_emp").val() === ""){
        return false;
    }
    return true;
}

function guardaryeditarE(e){
    console.log("Enviando formulario...");
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
    Swal.fire({
        title: '¡Correcto!',
        text: 'Usuario creado Correctamente ',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });
    limpiar(e);
}

init();

function limpiar(e){
    $("#nombre_emp").val("");
    $("#apellido_emp").val("");
    $("#DNI_emp").val("");
    $("#phone_emp").val("");
    $("#email_emp").val("");
    $("#password_emp").val("");
}


