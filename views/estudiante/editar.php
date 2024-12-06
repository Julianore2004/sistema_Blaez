<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Editar Estudiante</h1>
    <form action="index.php?action=editar_estudiante" method="post">
        <input type="hidden" name="id" value="<?php echo $estudiante['id']; ?>">
        <div class="mb-3">
            <label for="nombrecompleto" class="form-label">Nombre Completo:</label>
            <input type="text" class="form-control" name="nombrecompleto" value="<?php echo $estudiante['nombrecompleto']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="programa_de_estudios" class="form-label">Programa de Estudios:</label>
            <input type="text" class="form-control" name="programa_de_estudios" value="<?php echo $estudiante['programa_de_estudios']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre:</label>
            <select class="form-select" name="semestre" required>
                <option value="Semestre I" <?php if ($estudiante['semestre'] == 'I') echo 'selected'; ?>>Semestre I</option>
                <option value="Semestre II" <?php if ($estudiante['semestre'] == 'II') echo 'selected'; ?>>Semestre II</option>
                <option value="Semestre III" <?php if ($estudiante['semestre'] == 'III') echo 'selected'; ?>>Semestre III</option>
                <option value="Semestre IV" <?php if ($estudiante['semestre'] == 'IV') echo 'selected'; ?>>Semestre IV</option>
                <option value="Semestre V" <?php if ($estudiante['semestre'] == 'V') echo 'selected'; ?>>Semestre V</option>
                <option value="Semestre VI" <?php if ($estudiante['semestre'] == 'VI') echo 'selected'; ?>>Semestre VI</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>

