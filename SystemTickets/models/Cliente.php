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
        public function estadisticaEstadoCli($atributo){
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "SELECT COUNT(*) AS repeticiones FROM tickets WHERE estado_ticket LIKE '%$atributo%'
            AND correo_cliente in (SELECT email_user FROM usuarios WHERE email_user=? ) 
            ORDER BY repeticiones DESC;";
            $sql = $conectar->prepare($sql);
            $sql-> bindValue(1, $_SESSION["email_user"]);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function estadisticaTituloCli($atributo){
            $conectar = parent::conexion();
            parent::set_Names();
            $sql = "SELECT COUNT(*) AS repeticiones FROM tickets WHERE titulo_ticket LIKE '%$atributo%' 
            AND correo_cliente in (SELECT email_user FROM usuarios WHERE email_user=? ) 
            ORDER BY repeticiones DESC;";
            $sql = $conectar->prepare($sql);
            $sql-> bindValue(1, $_SESSION["email_user"]);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        
    }
    
?>