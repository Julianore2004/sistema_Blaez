<?php
require_once __DIR__ . '/../model/EstudianteModel.php';

class EstudianteController {
    private $model;

    public function __construct() {
        $this->model = new EstudianteModel();
    }

    public function listar() {
        $estudiantes = $this->model->listar();
        require_once __DIR__ . '/../views/estudiante/listar.php';
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->registrar($_POST);
            header('Location: index.php?action=listar_estudiantes');
        } else {
            require_once __DIR__ . '/../views/estudiante/registrar.php';
        }
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->editar($_POST);
            header('Location: index.php?action=listar_estudiantes');
        } else {
            $estudiante = $this->model->obtenerPorId($_GET['id']);
            require_once __DIR__ . '/../views/estudiante/editar.php';
        }
    }

    public function eliminar() {
        $this->model->eliminar($_GET['id']);
        header('Location: index.php?action=listar_estudiantes');
    }

    public function buscar() {
        $nombre = $_GET['nombre'];
        $estudiantes = $this->model->buscarPorNombre($nombre);
        require_once __DIR__ . '/../views/estudiante/buscar.php';
    }
    public function filtrarPorSemestre() {
        $semestre = $_POST['semestre'];
        $estudiantesFiltrados = $this->model->filtrarPorSemestre($semestre);
        require_once __DIR__ . '/../views/estudiante/filtrar.php';
    }
}
?>
