<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_name = $_POST['user_name'];
            $user_password = $_POST['user_password'];

            $usuario = $this->model->autenticarUsuario($user_name, $user_password);

            if ($usuario) {
                $_SESSION['user_id'] = $usuario['user_id'];
                $_SESSION['user_name'] = $usuario['user_name'];
                $_SESSION['rol'] = $usuario['rol'];

                if ($usuario['rol'] === 'Administrador') {
                    header('Location: index.php?action=inicio');
                } elseif ($usuario['rol'] === 'Usuario') {
                    header('Location: index.php?action=inicio');
                }
                exit;
            } else {
                echo "Nombre de usuario o contraseña incorrectos.";
            }
        }
    }

    public function verPerfil() {
        require_once __DIR__ . '/../views/usuario/perfil.php';
    }

    public function editarPerfil() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            $usuario = $this->model->obtenerPorId($data['user_id']);

            // Si se proporciona una nueva contraseña, hashearla
            if (!empty($data['user_password'])) {
                $data['user_password_hash'] = password_hash($data['user_password'], PASSWORD_BCRYPT);
            }
            $this->model->editarPerfil($data);
            header('Location: index.php?action=ver_perfil');
        } else {
            require_once __DIR__ . '/../views/usuario/editar_perfil.php';
        }
    }

    public function listar() {
        $usuarios = $this->model->listar();
        require_once __DIR__ . '/../views/usuario/listar.php';
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->registrar($_POST);
            header('Location: index.php?action=listar_usuarios');
        } else {
            require_once __DIR__ . '/../views/usuario/registrar.php';
        }
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            $usuario = $this->model->obtenerPorId($data['user_id']);

            // Si se proporciona una nueva contraseña, hashearla
            if (!empty($data['user_password'])) {
                $data['user_password_hash'] = password_hash($data['user_password'], PASSWORD_BCRYPT);
            }
            $this->model->editar($data);
            header('Location: index.php?action=listar_usuarios');
        } else {
            $usuario = $this->model->obtenerPorId($_GET['id']);
            require_once __DIR__ . '/../views/usuario/editar.php';
        }
    }

    public function eliminar() {
        $this->model->eliminar($_GET['id']);
        header('Location: index.php?action=listar_usuarios');
    }

    public function buscar() {
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : ''; // Verifica que exista el parámetro 'nombre'
        $usuarios = $this->model->buscarPorNombre($nombre);
        require_once __DIR__ . '/../views/usuario/buscar.php';
    }
}
?>
