<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Registrar Estudiante</h1>
    <form action="index.php?action=registrar_estudiante" method="post">
        <div class="mb-3">
            <label for="nombrecompleto" class="form-label">Nombre Completo:</label>
            <input type="text" class="form-control" name="nombrecompleto" required>
        </div>
        <div class="mb-3">
            <label for="programa_de_estudios" class="form-label">Programa de Estudios:</label>
            <input type="text" class="form-control" name="programa_de_estudios" required>
        </div>
        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre:</label>
            <input type="text" class="form-control" name="semestre" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
