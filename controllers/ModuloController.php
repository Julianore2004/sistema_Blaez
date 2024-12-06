<?php
require_once "./models/ModuloModel.php";
class ModuloController {
    public static function registrarModulo($datos) {
        // Validar y limpiar los datos
        foreach ($datos as $key => $value) {
            $datos[$key] = ConsultasSQL::cleanString($value);
        }

        if (ModuloModel::insertarModulo($datos)) {
            return "Módulo registrado con éxito.";
        } else {
            return "Error al registrar el módulo.";
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