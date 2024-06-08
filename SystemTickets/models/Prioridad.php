<?php
    class Prioridad extends Conexion {
        public function getPrioridad(){
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "SELECT * from tk_prioridad WHERE est = 1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

    }
?>