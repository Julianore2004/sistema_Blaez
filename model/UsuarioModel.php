<?php
require_once __DIR__ . '/../config/conexion.php';

class UsuarioModel {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function autenticarUsuario($user_name, $user_password) {
        $query = "SELECT * FROM users WHERE user_name = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $user_name);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            if (password_verify($user_password, $usuario['user_password_hash'])) {
                return $usuario;
            }
        }
        return null;
    }
    
   

    public function obtenerPorId($user_id) {
        $query = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
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
        $stmt->execute();
    }

    public function editar($data) {
        $password_hash = password_hash($data['user_password'], PASSWORD_BCRYPT);
        $date_added = date('Y-m-d H:i:s'); // Fecha y hora actual
        $query = "UPDATE users SET firstname=?, lastname=?, user_name=?, user_password_hash=?, user_email=?, date_added=?, rol=? WHERE user_id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssssssi", $data['firstname'], $data['lastname'], $data['user_name'], $password_hash, $data['user_email'], $date_added, $data['rol'], $data['user_id']);
        $stmt->execute();
    }

    public function eliminar($id) {
        $query = "DELETE FROM users WHERE user_id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

  

    public function buscarPorNombre($nombre) {
        $query = "SELECT * FROM users WHERE firstname LIKE ? OR lastname LIKE ? OR user_name LIKE ?";
        $stmt = $this->conexion->prepare($query);
        $nombre = '%' . $nombre . '%';
        $stmt->bind_param("sss", $nombre, $nombre, $nombre);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
  
}
?>
