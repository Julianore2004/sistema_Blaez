<?php
require_once "library/conexion.php";

class UserModel
{
    // Insertar nuevo módulo
    public static function insertarUsuario($datos) {
        $tabla = "users";  // Nombre de la tabla
        $campos = "firstname, lastname, user_name, user_password_hash, user_email, rol";  // Campos de la tabla
        $valores = "'{$datos['firstname']}', '{$datos['lastname']}', '{$datos['user_name']}', '{$datos['user_password_hash']}', '{$datos['user_email']}', '{$datos['rol']}'";  // Valores a insertar, con la fecha actual

        return consultasSQL::InsertSQL($tabla, $campos, $valores);
    }
    public static function obtenerUsuarios() {
        $query = "SELECT user_id, firstname, lastname, user_name, user_email, rol, date_added FROM users";
        return Conexion::consultar($query);
    }
}
?>
