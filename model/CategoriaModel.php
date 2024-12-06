<?php
require_once __DIR__ . '/../config/conexion.php';

class CategoriaModel {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function listar() {
        $query = "SELECT * FROM categorias";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar($data) {
        $date_added = date('Y-m-d H:i:s'); // Fecha y hora actual
        $query = "INSERT INTO categorias (nombreCategoria, descripcion_categoria, date_added) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sss", $data['nombreCategoria'], $data['descripcion_categoria'], $date_added);
        $stmt->execute();
    }

    public function editar($data) {
        $date_added = date('Y-m-d H:i:s'); // Fecha y hora actual
        $query = "UPDATE categorias SET nombreCategoria=?, descripcion_categoria=?, date_added=? WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssi", $data['nombreCategoria'], $data['descripcion_categoria'], $date_added, $data['id']);
        $stmt->execute();
    }

    public function eliminar($id) {
        $query = "DELETE FROM categorias WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM categorias WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
