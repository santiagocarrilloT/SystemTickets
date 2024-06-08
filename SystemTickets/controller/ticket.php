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
    }
?>


