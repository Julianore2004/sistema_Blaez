<?php
require_once "library/conexion.php";

class InventarioModel {
    // Insertar nuevo inventario
    public static function insertarInventario($datos) {
        $tabla = "inventario";
        $campos = "codigo_patrimonial, denominacion, marca, modelo, tipo, color, serie, dimensiones, valor, situacion, estado_de_observacion, observaciones, imagen, id_estudiante, id_categoria";
        $valores = "'{$datos['codigo_patrimonial']}', '{$datos['denominacion']}', '{$datos['marca']}', '{$datos['modelo']}', '{$datos['tipo']}', '{$datos['color']}', '{$datos['serie']}', '{$datos['dimensiones']}', '{$datos['valor']}', '{$datos['situacion']}', '{$datos['estado_de_observacion']}', '{$datos['observaciones']}', '{$datos['imagen']}', '{$datos['id_estudiante']}', '{$datos['id_categoria']}'";

        return consultasSQL::InsertSQL($tabla, $campos, $valores);
    }

    // Obtener lista de estudiantes
    public static function obtenerEstudiantes() {
        $query = "SELECT id, nombrecompleto FROM estudiantes";
        return Conexion::consultar($query);
    }

    // Obtener lista de categorías
    public static function obtenerCategorias() {
        $query = "SELECT id, nombreCategoria FROM categorias";
        return Conexion::consultar($query);
    }
    public static function obtenerInventarios() {
        $query = "SELECT i.id, i.codigo_patrimonial, i.denominacion, i.marca, i.modelo, i.tipo, i.color, 
                         i.serie, i.dimensiones, i.valor, i.situacion, i.estado_de_observacion, i.observaciones, 
                         i.imagen, e.nombrecompleto AS estudiante, c.nombreCategoria AS categoria 
                  FROM inventario i 
                  JOIN estudiantes e ON i.id_estudiante = e.id
                  JOIN categorias c ON i.id_categoria = c.id";
        return Conexion::consultar($query);
    }
}
?>
