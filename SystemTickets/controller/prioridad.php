<?php
    require_once ("../config/conexion.php");
    require_once ("../models/Prioridad.php");
    $prioridad = new Prioridad();

    switch($_GET["op"]){
        case "combo":
            $datos = $prioridad->getPrioridad();
            if (is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $html.= "<option id='estado_ticket' value='".$row['prior_id']."'>".$row['prior_nom']."</option>";
                }
                echo $html;
            }
            else {
                // En caso de que no haya datos, devolver un mensaje de depuración
                echo "No se encontraron datos";
            }
        break;    
    }
?>