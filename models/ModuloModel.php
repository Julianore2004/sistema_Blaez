<?php
require_once "./library/conexion.php";

class ModuloModel
{
    // Insertar nuevo módulo
    public static function insertarModulo($datos) {
        $tabla = "modulo";
        $campos = "nombre, descripcion, id_inventario, imagen";
        $valores = "'{$datos['nombre']}', '{$datos['descripcion']}', '{$datos['id_inventario']}', '{$datos['imagen']}'";

        return consultasSQL::InsertSQL($tabla, $campos, $valores);
    }

    // Obtener lista de Inventario
    public static function obtenerInventarios()
    {
        $query = "SELECT id, codigo_patrimonial FROM inventario";
        return Conexion::consultar($query);
    }
    public static function obtenerModulos() {
        $query = "SELECT m.id, m.nombre, m.descripcion, m.imagen, i.codigo_patrimonial AS inventario
                  FROM modulo m
                  LEFT JOIN inventario i ON m.id_inventario = i.id";
        return Conexion::consultar($query);
    }
}
?>