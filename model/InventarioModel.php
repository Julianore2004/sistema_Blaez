<?php
require_once __DIR__ . '/../config/conexion.php';

class InventarioModel {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function listar() {
        $query = "SELECT i.*, c.nombreCategoria, e.nombrecompleto
                  FROM inventario i
                  JOIN categorias c ON i.id_categoria = c.id
                  JOIN estudiantes e ON i.id_estudiante = e.id";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar($data) {
        $query = "INSERT INTO inventario (codigo_patrimonial, denominacion, marca, modelo, tipo, color, serie, dimensiones, valor, situacion, estado_de_observacion, observaciones, imagen, id_estudiante, id_categoria) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssssssssssssssi", $data['codigo_patrimonial'], $data['denominacion'], $data['marca'], $data['modelo'], $data['tipo'], $data['color'], $data['serie'], $data['dimensiones'], $data['valor'], $data['situacion'], $data['estado_de_observacion'], $data['observaciones'], $data['imagen'], $data['id_estudiante'], $data['id_categoria']);
        $stmt->execute();
    }

    public function editar($data) {
        $query = "UPDATE inventario SET codigo_patrimonial=?, denominacion=?, marca=?, modelo=?, tipo=?, color=?, serie=?, dimensiones=?, valor=?, situacion=?, estado_de_observacion=?, observaciones=?, imagen=?, id_estudiante=?, id_categoria=? WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssssssssssssssii", $data['codigo_patrimonial'], $data['denominacion'], $data['marca'], $data['modelo'], $data['tipo'], $data['color'], $data['serie'], $data['dimensiones'], $data['valor'], $data['situacion'], $data['estado_de_observacion'], $data['observaciones'], $data['imagen'], $data['id_estudiante'], $data['id_categoria'], $data['id']);
        $stmt->execute();
    }

    public function eliminar($id) {
        $query = "DELETE FROM inventario WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM inventario WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function obtenerCategorias() {
        $query = "SELECT id, nombreCategoria FROM categorias";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerEstudiantes() {
        $query = "SELECT id, nombrecompleto FROM estudiantes";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
