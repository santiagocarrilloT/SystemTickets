<?php
    require_once ("../config/conexion.php");
    require_once ("../models/Cliente.php");
    $ticketCli = new Cliente();

    switch($_GET["op"]){
        case "estadistica_cli":
            $datos = $ticketCli->estadisticaEstadoCli($_POST["estado_cli"]);
            $resultado = "";
            foreach($datos as $row){
                $resultado = $row["repeticiones"];
            }
            echo $resultado;
            break;
        case "titulo_count_cli":
            $datos = $ticketCli->estadisticaTituloCli($_POST["titulo_cli"]);
            $resultado = "";
            foreach($datos as $row){
                $resultado = $row["repeticiones"];
            }
            echo $resultado;
            break;
        break;
    }
?>