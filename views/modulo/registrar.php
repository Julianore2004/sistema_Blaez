<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Registrar Módulo</h1>
    <form action="index.php?action=registrar_modulo" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <select class="form-select" name="nombre" id="nombre" required>
                <option value="Módulo I">Módulo I</option>
                <option value="Módulo II">Módulo II</option>
                <option value="Módulo III">Módulo III</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" name="descripcion" required></textarea>
        </div>
        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre:</label>
            <select class="form-select" name="semestre" id="semestre" required>
                <option value="Semestre I Semestre II">Semestre I Semestre II</option>
               
                <option value="Semestre III Semestre IV">Semestre III Semestre IV</option>
               
                <option value="Semestre V Semestre VI">Semestre V Semestre VI</option>
             
            </select>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">URL de la Imagen:</label>
            <input type="url" class="form-control" name="imagen" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
<script>
    document.getElementById('nombre').addEventListener('change', function () {
        var semestreSelect = document.getElementById('semestre');
        var selectedModule = this.value;

        // Limpiar las opciones actuales
        semestreSelect.innerHTML = '';

        // Agregar las opciones correspondientes al módulo seleccionado
        if (selectedModule === 'Módulo I') {
            semestreSelect.innerHTML = '  <option value="Semestre I Semestre II">Semestre I Semestre II</option>';
        } else if (selectedModule === 'Módulo II') {
            semestreSelect.innerHTML = '   <option value="Semestre III Semestre IV">Semestre III Semestre IV</option>';
        } else if (selectedModule === 'Módulo III') {
            semestreSelect.innerHTML = '<option value="Semestre V Semestre VI">Semestre V Semestre VI</option>';
        }
    });
</script>
<?php require_once __DIR__ . '/../footer.php'; ?>