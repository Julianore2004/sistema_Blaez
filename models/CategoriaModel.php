<?php
require_once "library/conexion.php";

class CategoriaModel {
    public static function insertarCategoria($nombre, $descripcion) {
        $tabla = "categorias";
        $campos = "nombreCategoria, descripcion_categoria, date_added";
        $valores = "'$nombre', '$descripcion', NOW()";

        return consultasSQL::InsertSQL($tabla, $campos, $valores);
    }
    public static function obtenerCategorias() {
        $query = "SELECT id, nombreCategoria, descripcion_categoria, date_added FROM categorias";
        return Conexion::consultar($query);
    }
}
?>

