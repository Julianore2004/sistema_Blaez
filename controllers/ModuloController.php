<?php
require_once "./models/ModuloModel.php";

class ModuloController {
    public static function registrarModulo($datos) {
        // Validar y limpiar los datos
        foreach ($datos as $key => $value) {
            $datos[$key] = consultasSQL::clean_string($value);
        }

        if (ModuloModel::insertarModulo($datos)) {
            return "Modulo registrado con éxito.";
        } else {
            return "Error al registrar el Modulo.";
        }
    }

    public static function listarInventario() {
        return ModuloModel::obtenerInventarios();
    }
    public static function listarModulos() {
        return ModuloModel::obtenerModulos();
    }
}
?>