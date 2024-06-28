<?php
    require_once ("../config/conexion.php");
    require_once ("../models/Cliente.php");
    $ticket = new Cliente();

    switch($_GET["op"]){      
        case "listar_tickets":
            $datos = $ticket->listarTicket();            
            foreach($datos as $row){
                $data[] = array(
                    "id_ticket" => $row["id_ticket"],
                    "numserie_ticket" => $row["numserie_ticket"],
                    "titulo_ticket" => $row["titulo_ticket"],
                    "fecha_vencimiento" => $row["fecha_vencimiento"],
                    "estado_ticket" => $row["estado_ticket"],
                    "correo_cliente" => $row["correo_cliente"]
                );
            }
            $resultado = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);    
            echo json_encode($resultado);
            break;

        case "filtrar_tickets":
            $datos = $ticket->buscarTicket($_POST["atributo_ticket"], $_POST["valor"]);
            foreach($datos as $row){
                $data[] = array(
                    "id_ticket" => $row["id_ticket"],
                    "numserie_ticket" => $row["numserie_ticket"],
                    "titulo_ticket" => $row["titulo_ticket"],
                    "fecha_vencimiento" => $row["fecha_vencimiento"],
                    "estado_ticket" => $row["estado_ticket"],
                    "correo_cliente" => $row["correo_cliente"]
                );
            }
            $resultado = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);    
            echo json_encode($resultado);
            break;

        case "obtener_ticket":
            $datos = $ticket->obtenerTicket($_POST["ticket_id"]);
            foreach($datos as $row){
                $data[] = array(
                    "id_ticket" => $row["id_ticket"],
                    "modelo_ticket" => $row["modelo_ticket"],
                    "numserie_ticket" => $row["numserie_ticket"],
                    "titulo_ticket" => $row["titulo_ticket"],
                    "descripcion_ticket" => $row["descripcion_ticket"],
                    "fecha_vencimiento" => $row["fecha_vencimiento"],
                    "estado_ticket" => $row["estado_ticket"],
                    "correo_cliente" => $row["correo_cliente"],
                    "fecha_creacion" => $row["fecha_creacion"],
                    "user_create" => $row["user_create"]
                );
            }
            $resultado = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);    
            echo json_encode($resultado);
            break; 
        case "estadistica_cli":
            $datos = $ticket->estadisticaEstadoCli($_POST["estado_cli"]);
            $resultado = "";
            foreach($datos as $row){
                $resultado = $row["repeticiones"];
            }
            echo $resultado;
            break;
            
        case "titulo_count_cli":
            $datos = $ticket->estadisticaTituloCli($_POST["titulo_cli"]);
            $resultado = "";
            foreach($datos as $row){
                $resultado = $row["repeticiones"];
            }
            echo $resultado;
            break;
        break;
        case "insert":
            $datos = $ticket->nuevoCliente(
                $_POST["DNI_user"],
                $_POST["nombre_user"],
                $_POST["apellido_user"],
                $_POST["phone_user"],
                $_POST["email_user"],
                $_POST["password_user"]
            );
        break;
        case "delete":
            $datos = $ticket->eliminarCliente(
                $_POST["elim_correo"]
            );
        break;
        case "editar":
            $datos = $ticket->editarCliente(
                $_POST["bDni_user"],
                $_POST["bNombre_user"],
                $_POST["bApellido_user"],
                $_POST["bPhone_user"],
                $_POST["bEmail_user"],
                $_POST["bPassword_user"]
            );
        break;
        case "buscar":
            $datos = $ticket->buscarCliente(
                $_POST["buscar_user"]
            );
        break;
    }
?>
