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
    }
?>


