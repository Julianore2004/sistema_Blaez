<?php
// Controlador (UserController.php)
require_once "models/UserModel.php";

class UserController {
    // Registrar Usuario
    public static function registrarUsuario($datos) {
        // Validar y limpiar los datos
        foreach ($datos as $key => $value) {
            $datos[$key] = ConsultasSQL::cleanString($value);
        }

        // Verificar si el nombre de usuario ya está registrado
        if (self::verificarUsuarioExistente($datos['user_name'])) {
            return "El nombre de usuario ya está registrado.";
        }

        // Cifrar la contraseña con password_hash
        $datos['user_password_hash'] = password_hash($datos['user_password_hash'], PASSWORD_BCRYPT);

        // Registrar el usuario
        if (UserModel::insertarUsuario($datos)) {
            return "Usuario registrado con éxito.";
        } else {
            return "Error al registrar el usuario.";
        }
    }

    // Listar usuarios
    public static function listarUsuarios() {
        return UserModel::obtenerUsuarios();
    }

    // Verificar si el usuario existe
    public static function verificarUsuarioExistente($username) {
        return UserModel::usuarioExistente($username);
    }
}


?>
