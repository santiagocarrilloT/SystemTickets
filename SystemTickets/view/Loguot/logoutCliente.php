<?php
    require_once ("../../config/conexion.php");
    session_destroy();
    header("Location: ".Conexion::ruta()."indexCliente.php");
    exit();

?>