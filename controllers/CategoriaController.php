<?php
require_once "./models/CategoriaModel.php";

class CategoriaController {
    public static function registrarCategoria($nombre, $descripcion) {
        $nombre = ConsultasSQL::cleanString($nombre);  // Usa el método de limpieza de cadena
        $descripcion = ConsultasSQL::cleanString($descripcion); // Lo mismo con la descripción

        if (CategoriaModel::insertarCategoria($nombre, $descripcion)) {
            return "Categoría registrada con éxito.";
        } else {
            return "Error al registrar la categoría.";
        }
    }

    public static function listarCategorias() {
        return CategoriaModel::obtenerCategorias();
    }
}

?>
