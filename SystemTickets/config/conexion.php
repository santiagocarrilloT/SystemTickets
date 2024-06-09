<?php

    session_start();
    
    class Conexion{
        protected $dbh;

        protected function conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=ticketsdb", "root","");
                return $conectar;
            }
            catch (Exception $e){
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_Names (){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        public static function ruta (){
            return "http://localhost/SistemaGestionDeTickets/SystemTickets/";
        }
    }
?>