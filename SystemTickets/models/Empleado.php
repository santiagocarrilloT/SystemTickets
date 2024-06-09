<?php
class Empleado extends Conexion {

    public function nuevoEmpleado($DNI_emp, $nombre_emp, $apellido_emp, $phone_emp, $email_emp, $password_emp){
        $conectar = parent::conexion();
        parent::set_Names();

        // Consulta para verificar si el empleado ya existe
        $sql_check = "SELECT * FROM empleados WHERE DNI_emp = ? OR email_emp = ? OR phone_emp = ?";
        $query_check = $conectar->prepare($sql_check);
        $query_check->bindValue(1, $DNI_emp);
        $query_check->bindValue(2, $email_emp);
        $query_check->bindValue(3, $phone_emp);
        $query_check->execute();

        if ($query_check->rowCount() > 0) {
            // El empleado ya existe     
            return false;
        } else {
            // Hashear la contraseña usando BCRYPT
            $hashed_password = password_hash($password_emp, PASSWORD_BCRYPT);
            
            // El empleado no existe, continuar con la inserción
            $sql = "INSERT INTO empleados (DNI_emp, nombre_emp, apellido_emp, phone_emp, email_emp, password_emp) VALUES (?,?,?,?,?,?)";
            $query_insert = $conectar->prepare($sql);
            $query_insert->bindValue(1, $DNI_emp);
            $query_insert->bindValue(2, $nombre_emp);
            $query_insert->bindValue(3, $apellido_emp);
            $query_insert->bindValue(4, $phone_emp);
            $query_insert->bindValue(5, $email_emp);
            $query_insert->bindValue(6, $hashed_password);
            
            if ($query_insert->execute()) {
                return true;
                
            } else {
                return false; // Error en la inserción
            }
        }
    }

    //funcion para eliminar usuario por medio del correo
    public function eliminarEmpleado($email_emp){
        $conectar = parent::conexion();
        parent::set_Names();

        $sql = "DELETE FROM empleados WHERE email_emp = ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $email_emp);
        $query->execute();

        return $query;
    }

    //funcion para editar usuario obteniendo el correo
    public function editarEmpleado($DNI_emp, $nombre_emp, $apellido_emp, $phone_emp, $email_emp, $password_emp){
        $conectar = parent::conexion();
        parent::set_Names();

        // Hashear la contraseña usando BCRYPT
        $hashed_password = password_hash($password_emp, PASSWORD_BCRYPT);

        $sql = "UPDATE empleados SET DNI_emp = ?, nombre_emp = ?, apellido_emp = ?, phone_emp = ?, email_emp = ?, password_emp = ? WHERE email_emp = ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $DNI_emp);
        $query->bindValue(2, $nombre_emp);
        $query->bindValue(3, $apellido_emp);
        $query->bindValue(4, $phone_emp);
        $query->bindValue(5, $email_emp);
        $query->bindValue(6, $hashed_password);
        $query->bindValue(7, $email_emp);
        $query->execute();

        return $query;
    }
    

}
?>
