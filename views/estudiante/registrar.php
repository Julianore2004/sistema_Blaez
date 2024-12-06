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
            <select class="form-select" name="semestre" required>
                <option value="Semestre I">Semestre I</option>
                <option value="Semestre II">Semestre II</option>
                <option value="Semestre III">Semestre III</option>
                <option value="Semestre IV"> SemestreIV</option>
                <option value="Semestre V">Semestre V</option>
                <option value="Semestre VI">Semestre VI</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>

AHORA QUIRO QUE IMLEMENTES ESTA PAGINA PRINCIPAL CON LA LOGICA QUE MANEJAS, QUE LOS MODULOS SE MUESTREN PERO SIN LOS BOTONES DE EDITAR ELIMIANR Y AGREGAR 