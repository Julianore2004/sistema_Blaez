<?php
require_once __DIR__ . '/../model/ModuloModel.php';

class ModuloController {
    private $model;

    public function __construct() {
        $this->model = new ModuloModel();
    }

    public function listar() {
        $modulos = $this->model->listar();
        require_once __DIR__ . '/../views/modulo/listar.php';
    }

    public function registrar() {
        $estudiantes = $this->model->obtenerEstudiantes();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->registrar($_POST);
            header('Location: index.php?action=listar_modulos');
        } else {
            require_once __DIR__ . '/../views/modulo/registrar.php';
        }
    }

    public function editar() {
        $estudiantes = $this->model->obtenerEstudiantes();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->editar($_POST);
            header('Location: index.php?action=listar_modulos');
        } else {
            $modulo = $this->model->obtenerPorId($_GET['id']);
            require_once __DIR__ . '/../views/modulo/editar.php';
        }
    }

    public function eliminar() {
        $this->model->eliminar($_GET['id']);
        header('Location: index.php?action=listar_modulos');
    }
}
?>
