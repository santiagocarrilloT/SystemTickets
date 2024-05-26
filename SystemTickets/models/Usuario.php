<?php
    class Usuario extends Conexion{
        public function login(){
            $conectar = parent::conexion();
            parent::set_Names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["email_emp"];
                $password = $_POST["password_emp"];
                if (empty($correo) or empty($password)) {
                    header ("Location:".Conexion::ruta()."index.php?m=2");
                    exit();
                }
                else{
                    $sql = "SELECT * FROM empleados WHERE email_emp=? AND password_emp=?";
                    $stmt = $conectar->prepare($sql);
                    $stmt -> bindValue (1, $correo);
                    $stmt -> bindValue (2, $password);
                    $stmt -> execute();
                    $resultado = $stmt -> fetch();
                    if(is_array($resultado) and count($resultado)>0){
                        // Atributos de la tabla empleados
                        $_SESSION["Id_emp"] = $resultado["Id_emp"];
                        $_SESSION["DNI_emp"] = $resultado["DNI_emp"];
                        $_SESSION["email_emp"] = $resultado["email_emp"];
                        $_SESSION["nombre_emp"] = $resultado["nombre_emp"];
                        header("Location: ".Conexion::ruta()."view/home/index.php");
                        exit();
                    }
                    else{
                        header("Location: ".Conexion::ruta()."index.php?m=1");
                        exit();
                    }
                }   
            }
        }
    }
    
?>