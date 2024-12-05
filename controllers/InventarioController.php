<?php
require_once "models/InventarioModel.php";

class InventarioController {
    public static function registrarInventario($datos) {
        // Validar y limpiar los datos
        foreach ($datos as $key => $value) {
            $datos[$key] = consultasSQL::clean_string($value);
        }

        if (InventarioModel::insertarInventario($datos)) {
            return "Inventario registrado con éxito.";
        } else {
            return "Error al registrar el inventario.";
        }
    }

    public static function listarEstudiantes() {
        return InventarioModel::obtenerEstudiantes();
    }

    public static function listarCategorias() {
        return InventarioModel::obtenerCategorias();
    }
    public static function listarInventarios() {
        return InventarioModel::obtenerInventarios();
    }
}
?>
