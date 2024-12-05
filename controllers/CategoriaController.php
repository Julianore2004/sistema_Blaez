<?php
require_once "./models/CategoriaModel.php";

class CategoriaController {
    public static function registrarCategoria($nombre, $descripcion) {
        $nombre = consultasSQL::clean_string($nombre);
        $descripcion = consultasSQL::clean_string($descripcion);

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
