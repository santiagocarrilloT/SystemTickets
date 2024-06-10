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
    

        //funcion para crear un nuevo cliente
        public function nuevoCliente($DNI_user, $nombre_user, $apellido_user, $phone_user, $email_user, $password_user){
            $conectar = parent::conexion();
            parent::set_Names();
    
            // Consulta para verificar si el empleado ya existe
            $sql_check = "SELECT * FROM usuarios WHERE DNI_user = ? OR email_user = ? OR phone_user = ?";
            $query_check = $conectar->prepare($sql_check);
            $query_check->bindValue(1, $DNI_user);
            $query_check->bindValue(2, $email_user);
            $query_check->bindValue(3, $phone_user);
            $query_check->execute();
    
            if ($query_check->rowCount() > 0) {
                // El empleado ya existe     
                return false;
            } else {
                // Hashear la contraseña usando BCRYPT
                $hashed_password = password_hash($password_user, PASSWORD_BCRYPT);
                
                // El empleado no existe, continuar con la inserción
                $sql = "INSERT INTO usuarios (DNI_user, nombre_user, apellido_user, phone_user, email_user, password_user) VALUES (?,?,?,?,?,?)";
                $query_insert = $conectar->prepare($sql);
                $query_insert->bindValue(1, $DNI_user);
                $query_insert->bindValue(2, $nombre_user);
                $query_insert->bindValue(3, $apellido_user);
                $query_insert->bindValue(4, $phone_user);
                $query_insert->bindValue(5, $email_user);
                $query_insert->bindValue(6, $hashed_password);
                
                if ($query_insert->execute()) {
                    return true;
                    
                } else {
                    return false; // Error en la inserción
                }
            }
        }

        //funcion para eliminar usuario por medio del correo
        public function eliminarCliente($email_user){
            $conectar = parent::conexion();
            parent::set_Names();

            $sql = "DELETE FROM usuarios WHERE email_user = ?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $email_user);
            $query->execute();

            return $query;
        }

        // Editar empleado primero hace con consulta con el correo para obtener el id, luego con ese id se hace la cunsulta y se actualizan los datos
        public function editarCliente($DNI_user, $nombre_user, $apellido_user, $phone_user, $email_user, $password_user){
            $conectar = parent::conexion();
            parent::set_Names();

            // Consulta para obtener el id y password del empleado
            $sql_check = "SELECT id_user, password_user FROM usuarios WHERE email_user = ?";
            $query_check = $conectar->prepare($sql_check);
            $query_check->bindValue(1, $email_user);
            $query_check->execute();

            $result = $query_check->fetch(PDO::FETCH_ASSOC);
            $id_user = $result['id_user'];
            $pass_user = $result['password_user'];
            
            if($password_user == $pass_user){
                $hashed_password = $password_user;            
            }else{
                // Hashear la contraseña usando BCRYPT
                $hashed_password = password_hash($password_user, PASSWORD_BCRYPT);            
            }
                
            // Consulta para actualizar los datos del empleado
            $sql = "UPDATE usuarios SET DNI_user = ?, nombre_user = ?, apellido_user = ?, phone_user = ?, email_user = ?, password_user = ? WHERE id_user = ?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $DNI_user);
            $query->bindValue(2, $nombre_user);
            $query->bindValue(3, $apellido_user);
            $query->bindValue(4, $phone_user);
            $query->bindValue(5, $email_user);
            $query->bindValue(6, $hashed_password);
            $query->bindValue(7, $id_user);
            $query->execute();

            return $query;
        }
    
    
    
        //funcion para buscar usuario por medio del correo y devolver los datos
        public function buscarCliente($email_user){
            $conectar = parent::conexion();
            parent::set_Names();
        
            $sql = "SELECT * FROM usuarios WHERE email_user = ?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $email_user);
            $query->execute();
        
            $result = $query->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                // Devuelve los datos del empleado en formato JSON
                echo json_encode($result);
            } else {
                // Devuelve un JSON vacío
                echo json_encode([]);
            }
        }        
}

    
?>