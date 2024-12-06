<?php
require_once __DIR__ . '/../config/conexion.php';

class UsuarioModel {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function listar() {
        $query = "SELECT * FROM users";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar($data) {
        $password_hash = password_hash($data['user_password'], PASSWORD_BCRYPT);
        $date_added = date('Y-m-d H:i:s'); // Fecha y hora actual
        $query = "INSERT INTO users (firstname, lastname, user_name, user_password_hash, user_email, date_added, rol) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssssss", $data['firstname'], $data['lastname'], $data['user_name'], $password_hash, $data['user_email'], $date_added, $data['rol']);
        if ($stmt->execute()) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "Error al registrar usuario: " . $stmt->error;
        }
    }

    public function editar($data) {
        $password_hash = password_hash($data['user_password'], PASSWORD_BCRYPT);
        $date_added = date('Y-m-d H:i:s'); // Fecha y hora actual
        $query = "UPDATE users SET firstname=?, lastname=?, user_name=?, user_password_hash=?, user_email=?, date_added=?, rol=? WHERE user_id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssssssi", $data['firstname'], $data['lastname'], $data['user_name'], $password_hash, $data['user_email'], $date_added, $data['rol'], $data['user_id']);
        if ($stmt->execute()) {
            echo "Usuario actualizado exitosamente.";
        } else {
            echo "Error al actualizar usuario: " . $stmt->error;
        }
    }

    public function eliminar($id) {
        $query = "DELETE FROM users WHERE user_id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM users WHERE user_id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
