<?php
require_once __DIR__ . '/../config/conexion.php';

class ModuloModel {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function listar() {
        $query = "SELECT m.*, i.denominacion AS inventario_denominacion
                  FROM modulo m
                  LEFT JOIN inventario i ON m.id_inventario = i.id";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar($data) {
        $query = "INSERT INTO modulo (nombre, descripcion, id_inventario, imagen) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssis", $data['nombre'], $data['descripcion'], $data['id_inventario'], $data['imagen']);
        $stmt->execute();
    }

    public function editar($data) {
        $query = "UPDATE modulo SET nombre=?, descripcion=?, id_inventario=?, imagen=? WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssisi", $data['nombre'], $data['descripcion'], $data['id_inventario'], $data['imagen'], $data['id']);
        $stmt->execute();
    }

    public function eliminar($id) {
        $query = "DELETE FROM modulo WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM modulo WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function obtenerInventarios() {
        $query = "SELECT id, denominacion FROM inventario";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
