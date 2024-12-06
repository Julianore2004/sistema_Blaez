<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
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
            $this->model->editar($_POST);
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
}
?>
