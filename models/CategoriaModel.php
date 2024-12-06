<?php
require_once "library/conexion.php";

class CategoriaModel {
    public static function insertarCategoria($nombre, $descripcion) {
        $tabla = "categorias";  // Asegúrate de que la tabla se llame 'categorias' en la base de datos
        $campos = "nombreCategoria, descripcion_categoria, date_added";
        $valores = [$nombre, $descripcion, date('Y-m-d H:i:s')];
        return ConsultasSQL::InsertSQL($tabla, $campos, $valores);  // Usamos el método genérico para insertar
    }

    public static function obtenerCategorias() {
        $query = "SELECT id, nombreCategoria, descripcion_categoria, date_added FROM categorias";
        return ConsultasSQL::consultar($query);  // Usamos el método de consulta para obtener las categorías
    }
}


?>
