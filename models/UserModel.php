<?php

require_once "./library/conexion.php";

class UserModel {
    // Insertar un nuevo usuario
    public static function insertarUsuario($datos) {
        $tabla = "users";
        $campos = "firstname, lastname, user_name, user_password_hash, user_email, rol, date_added";
        $valores = "'{$datos['firstname']}', '{$datos['lastname']}', '{$datos['user_name']}', 
                    '{$datos['user_password_hash']}', '{$datos['user_email']}', '{$datos['rol']}', 
                    NOW()"; // Usar NOW() para la fecha actual

        return ConsultasSQL::InsertSQL($tabla, $campos, $valores);
    }

    // Obtener todos los usuarios
    public static function obtenerUsuarios() {
        $query = "SELECT user_id, firstname, lastname, user_name, user_email, rol, date_added FROM users";
        return ConsultasSQL::consultar($query);
    }

    // Verificar si el nombre de usuario ya está registrado
    public static function usuarioExistente($username) {
        $query = "SELECT user_id FROM users WHERE user_name = ?";
        $conn = Conexion::connect();
        $stmt = $conn->prepare($query);
        $stmt->execute([$username]);
        return $stmt->rowCount() > 0; // Si hay filas, el usuario existe
    }
}

?>
