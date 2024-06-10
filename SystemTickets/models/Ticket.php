<?php
    class Ticket extends Conexion {

        public function nuevoTicket($modelo_ticket, $numserie_ticket, $titulo_ticket, $descripcion_ticket, $fecha_vencimiento, $estado_ticket, $user_create, $correo_cliente){
            $conectar = parent::conexion();
            parent::set_Names();

            //Convertir el formato de la fecha
            $f_vencimientoDate = date('Y-m-d', strtotime($fecha_vencimiento));
            //Convertir estado del ticket en texto
            $name_Estado = $this->getPrioridad($estado_ticket);

            if ($modelo_ticket == '' || $numserie_ticket == '' || $titulo_ticket == '' || $descripcion_ticket == '' || $fecha_vencimiento == '' || $user_create == '' || $correo_cliente == ''){
                //Enviar error al JS
                echo "Error: Todos los campos son obligatorios.";
                exit();
            }else{
                $sql = "INSERT INTO `tickets` 
                (`id_ticket`, `modelo_ticket`, `numserie_ticket`, `titulo_ticket`, `descripcion_ticket`, `fecha_vencimiento`, `estado_ticket`, `user_create`, `correo_cliente`) 
                VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
                $sql = $conectar->prepare($sql);
                $sql-> bindValue(1, $modelo_ticket);
                $sql-> bindValue(2, $numserie_ticket);
                $sql-> bindValue(3, $titulo_ticket);
                $sql-> bindValue(4, $descripcion_ticket);
                $sql-> bindValue(5, $f_vencimientoDate);
                $sql-> bindValue(6, $name_Estado);
                $sql-> bindValue(7, $user_create);
                $sql-> bindvalue(8, $correo_cliente);
                $sql->execute();
                $resultado = $sql->fetchAll();
            }
        }

        private function getPrioridad($estado_ticket){
            $convertEstado = (int)$estado_ticket;
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "SELECT prior_nom FROM tk_prioridad WHERE prior_id=?";
            $stmt = $conectar->prepare($sql);
            $stmt-> bindValue(1, $convertEstado);
            $stmt-> execute();
            $resultado = $stmt->fetch();
            if (is_array($resultado) and count($resultado)>0){
                return $resultado["prior_nom"];
            }else{
                return $estado_ticket;
            }
        }

        public function listarTicket(){
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "SELECT * FROM tickets";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function buscarTicket($atributo, $valor){
            switch($atributo){
                case '1':
                    $atributo = "id_ticket";
                    break;
                case '2':
                    $atributo = "numserie_ticket";
                    break;
                case '3':
                    $atributo = "titulo_ticket";
                    break;
                case '4':
                    $atributo = "fecha_vencimiento";
                    break;
                case '5':
                    $atributo = "estado_ticket";
                    break;
                case '6':
                    $atributo = "correo_cliente";
                    break;
            }
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "SELECT * FROM tickets WHERE ".$atributo." LIKE ? ;";
            $sql = $conectar->prepare($sql);
            $sql-> bindValue(1, "%".$valor."%");
            $sql->execute();
            $resultado = $sql->fetchAll();
            if (is_array($resultado) and count($resultado)>0){
                return $resultado;
            }else{
                echo $resultado;
            }
        }

        public function obtenerTicket($id_ticket){
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "SELECT * FROM tickets WHERE id_ticket = ?";
            $sql = $conectar->prepare($sql);
            $sql-> bindValue(1, $id_ticket);
            $sql->execute();
            $resultado = $sql->fetchAll();
            if (is_array($resultado) and count($resultado)>0){
                return $resultado;
            }else{
                echo $_GET;
            }
        }

        public function editarTicket($id_ticket, $modelo_ticket, $numserie_ticket, $titulo_ticket, $descripcion_ticket, $fecha_vencimiento, $estado_ticket, $correo_cliente){
            $name_Estado = $this->getPrioridad($estado_ticket);
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "UPDATE tickets SET modelo_ticket = ?, numserie_ticket = ?, titulo_ticket = ?, 
            descripcion_ticket = ?, fecha_vencimiento = ?, estado_ticket = ?, correo_cliente = ?
            WHERE id_ticket = ? ";
            $sql = $conectar->prepare($sql);
            $sql-> bindValue(1, $modelo_ticket);
            $sql-> bindValue(2, $numserie_ticket);
            $sql-> bindValue(3, $titulo_ticket);
            $sql-> bindValue(4, $descripcion_ticket);
            $sql-> bindValue(5, $fecha_vencimiento);
            $sql-> bindValue(6, $name_Estado);
            $sql-> bindValue(7, $correo_cliente);
            $sql-> bindValue(8, $id_ticket);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function estadisticaEstado($atributo){
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "SELECT COUNT(*) AS repeticiones 
            FROM tickets WHERE estado_ticket = ? 
            ORDER BY repeticiones DESC";
            $sql = $conectar->prepare($sql);
            $sql-> bindValue(1, $atributo);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function estadisticaTitulo($atributo){
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "SELECT COUNT(*) AS repeticiones 
            FROM tickets WHERE titulo_ticket LIKE '%$atributo%'
            ORDER BY repeticiones DESC;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }
?>