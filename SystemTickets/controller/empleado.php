<?php
    require_once ("../config/conexion.php");
    require_once ("../models/Empleado.php");
    $empleado = new Empleado();

    switch($_GET["op"]){
        case "insert":
            $datos = $empleado->nuevoEmpleado(
                $_POST["DNI_emp"],
                $_POST["nombre_emp"],
                $_POST["apellido_emp"],
                $_POST["phone_emp"],
                $_POST["email_emp"],
                $_POST["password_emp"]
            );
        break;
    }
?>