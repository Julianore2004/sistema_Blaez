<?php // LISTAR ESTUDIANTES

require_once "./controllers/EstudianteController.php";
// Obtener los estudiantes desde el controlador
$estudiantes = EstudianteController::listarEstudiantes();
?>

<div class="container mt-5">
    <div class="text-end mb-3">
        <a class="btn btn-primary" href="<?php echo BD_URL ?>registrar-estudiante">Agregar Estudiante</a>
    </div>

    <h2 class="mb-4">Listado de Estudiantes</h2>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Programa de Estudios</th>
                <th>Semestre</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <?php while ($row = $estudiantes->fetch()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['nombrecompleto']) ?></td>
                    <td><?= htmlspecialchars($row['programa_de_estudios']) ?></td>
                    <td><?= htmlspecialchars($row['semestre']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
