<?php

    session_start();
    
    class Conexion{
        protected $dbh

        protected function conexion(){
            try{
                $conectar = $this->dbh = new PDO ("myssql:local=localhost;dbname=ticketsdb", "root","");
                return $conectar;
            }
            catch (Exception $e){
                print "¡Error DB!: " . $e->getMessage() . "<br/>";
                die();
            }
        }


        public function set_Names (){
            return $this->dbh-query("SET NAMES 'utf-8'");
        }

        public function ruta (){
            return "http://localhost/SystemTickets/";
        }
    }
?>