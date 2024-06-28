<?php
    require_once ("../config/conexion.php");
    require_once ("../models/Ticket.php");
    $ticket = new Ticket();

    switch($_GET["op"]){        
        case "insert":
            $datos = $ticket->nuevoTicket(
                $_POST["modelo_ticket"], $_POST["numserie_ticket"], $_POST["titulo_ticket"],
                $_POST["descripcion_ticket"], $_POST["fecha_vencimiento"], $_POST["estado_ticket"], 
                $_POST["user_create"], $_POST["correo_cliente"]
            );
            break;

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
        case "editar_ticket":
            $datos = $ticket->editarTicket(
                $_POST["ticket_id"], $_POST["edit_modelo"], $_POST["edit_numserie"], $_POST["edit_titulo"],
                $_POST["edit_descripcion"], $_POST["edit_vencimiento"], $_POST["edit_estado"], 
                $_POST["edit_correo"]
            );
            break;
        case "estadistica":
            $datos = $ticket->estadisticaEstado($_POST["estado"]);
            $resultado = "";
            foreach($datos as $row){
                $resultado = $row["repeticiones"];
            }
            echo $resultado;
            break;
        case "titulo_count":
            $datos = $ticket->estadisticaTitulo($_POST["titulo"]);
            $resultado = "";
            foreach($datos as $row){
                $resultado = $row["repeticiones"];
            }
            echo $resultado;
            break;
        break;
        
    }
?>


