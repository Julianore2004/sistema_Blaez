<?php
require_once "models/UserModel.php";

class UserController {
    public static function registrarUsuario($datos) {
        // Validar y limpiar los datos
        foreach ($datos as $key => $value) {
            $datos[$key] = consultasSQL::clean_string($value);
        }

        if (UserModel::insertarUsuario($datos)) {
            return "Usuario registrado con éxito.";
        } else {
            return "Error al registrar el Usuario.";
        }
    }
    public static function listarUsuarios() {
        return UserModel::obtenerUsuarios();
    }
}
?>
