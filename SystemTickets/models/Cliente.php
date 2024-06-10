<?php
    class Cliente extends Conexion{
        public function loginCliente(){
            $conectar = parent::conexion();
            parent::set_Names();
            if(isset($_POST["enviar"])){
                $correoCliente = $_POST["email_user"];
                if (empty($correoCliente)) {
                    header ("Location:".Conexion::ruta()."indexCliente.php?m=2");
                    exit();
                }
                else{
                    $sql = "SELECT * FROM usuarios WHERE email_user=?";
                    // $sql = "SELECT * FROM tickets WHERE user_create in (SELECT id_user FROM usuarios WHERE email_user= ?)";
                    $stmt = $conectar->prepare($sql);
                    $stmt -> bindValue (1, $correoCliente);
                    $stmt -> execute();
                    $resultado = $stmt -> fetch();
                    if(is_array($resultado) and count($resultado)>0){
                        // Atributos de la tabla tickets
                        $_SESSION["nombre_user"] = $resultado["nombre_user"];
                        $_SESSION["apellido_user"] = $resultado["apellido_user"];
                        $_SESSION["DNI_user"] = $resultado["DNI_user"];
                        $_SESSION["email_user"] = $resultado["email_user"];
                        $_SESSION["phone_user"] = $resultado["phone_user"];
                        header("Location: ".Conexion::ruta()."view/homeCliente/index.php");
                        exit();
                    }
                    else{
                        header("Location: ".Conexion::ruta()."indexCliente.php?m=1");
                        exit();
                    }
                }   
            }
        }

        public function listarTicket(){          
            $conectar = parent::conexion();
            parent::set_Names();            
            $sql = "SELECT * FROM tickets where correo_cliente in (SELECT email_user FROM usuarios WHERE correo_cliente= ?)";
            $sql = $conectar->prepare($sql);
            $sql-> bindValue(1, $_SESSION["email_user"]);
            $sql->execute();
            return $resultado = $sql->fetchAll();
            if(is_array($resultado) and count($resultado)>0){
                return $resultado;
            }else{
                echo "No hay tickets registrados";
            } 
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
            $sql = "SELECT * FROM tickets where correo_cliente in (SELECT email_user FROM usuarios WHERE correo_cliente=?) and $atributo like '%$valor%'";
            $sql = $conectar->prepare($sql);
            $sql-> bindValue(1, $_SESSION["email_user"]);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function obtenerTicket($id_ticket){
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "SELECT * FROM tickets where correo_cliente in (SELECT email_user FROM usuarios WHERE correo_cliente=?) and id_ticket = ?";
            $sql = $conectar->prepare($sql);
            $sql-> bindValue(1, $_SESSION["email_user"]);
            $sql-> bindValue(2, $id_ticket);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        
    }
    
?>