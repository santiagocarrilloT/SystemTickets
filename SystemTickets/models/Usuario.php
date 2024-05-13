<?php
    class Usuario extends Conexion{
        public function login(){
            $conectar = parent::conexion();
            parent::set_Names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["emp_correo"];
                $dni = $_POST["emp_dni"];
                if (empty($correo) or empty ($dni)) {
                    header ("Location:".Conexion::ruta()."index.php?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM employees WHERE emp_email=? AND emp_dni=? AND statusEmp=1";
                    $stmt = $conectar->prepare($sql);
                    $stmt -> bindValue (1, $correo);
                    $stmt -> bindValue (2, $dni);
                    $stmt -> execute();
                    $resultado = $stmt -> fetch(); 
                    if(is_array($resultado) and count($resultado)>0){
                        // Atributos de la tabla empleados
                        $_SESSION["emp_id"] = $resultado["emp_id"];
                        $_SESSION["emp_dni"] = $resultado["emp_dni"];
                        $_SESSION["emp_email"] = $resultado["emp_email"];
                        header("Location: ".Conexion::ruta(). "view/home/index.php");
                        exit();
                    }
                    else{
                        header("Location: ".Conexion::ruta(). "index.php?m=1");
                        exit();
                    }
                }
                
            }else{
                
            }
        }
    }

?>