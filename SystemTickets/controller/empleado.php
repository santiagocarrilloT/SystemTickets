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
        case "delete":
            $datos = $empleado->eliminarEmpleado(
                $_POST["elim_correo"]
            );
        break;
        case "editar":
            $datos = $empleado->editarEmpleado(
                $_POST["bDni_emp"],
                $_POST["bNombre_emp"],
                $_POST["bApellido_emp"],
                $_POST["bPhone_emp"],
                $_POST["bEmail_emp"],
                $_POST["bPassword_emp"]
            );
        break;
        case "buscar":
            $datos = $empleado->buscarEmpleado(
                $_POST["buscar_emp"]
            );
        break;
    }
?>