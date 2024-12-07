<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Editar Módulo</h1>
    <form action="index.php?action=editar_modulo" method="post">
        <input type="hidden" name="id" value="<?php echo $modulo['id']; ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <select class="form-select" name="nombre" id="nombre" required>
                <option value="Módulo I" <?php if ($modulo['nombre'] == 'Módulo I') echo 'selected'; ?>>Módulo I</option>
                <option value="Módulo II" <?php if ($modulo['nombre'] == 'Módulo II') echo 'selected'; ?>>Módulo II</option>
                <option value="Módulo III" <?php if ($modulo['nombre'] == 'Módulo III') echo 'selected'; ?>>Módulo III</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" name="descripcion" required><?php echo $modulo['descripcion']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre:</label>
            <select class="form-select" name="semestre" id="semestre" required>
                <?php if ($modulo['nombre'] == 'Módulo I'): ?>
                    <option value="Semestre I Semestre II" <?php if ($modulo['semestre'] == 'Semestre I Semestre II') echo 'selected'; ?>>Semestre I Semestre II</option>
                 <?php elseif ($modulo['nombre'] == 'Módulo II'): ?>
                    <option value="Semestre III Semestre IV" <?php if ($modulo['semestre'] == 'Semestre III Semestre IV') echo 'selected'; ?>>Semestre III Semestre IV</option>
                <?php elseif ($modulo['nombre'] == 'Módulo III'): ?>
                    <option value="Semestre V Semestre VI" <?php if ($modulo['semestre'] == 'Semestre V Semestre VI') echo 'selected'; ?>>Semestre V Semestre VI</option>
                <?php endif; ?>
               
            
            </select>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">URL de la Imagen:</label>
            <input type="url" class="form-control" name="imagen" value="<?php echo $modulo['imagen']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<script>
    document.getElementById('nombre').addEventListener('change', function() {
        var semestreSelect = document.getElementById('semestre');
        var selectedModule = this.value;

        // Limpiar las opciones actuales
        semestreSelect.innerHTML = '';
       
               
               
              
              
        // Agregar las opciones correspondientes al módulo seleccionado
        if (selectedModule === 'Módulo I') {
            semestreSelect.innerHTML = ' <option value="Semestre I Semestre II">Semestre I Semestre II</option>';
        } else if (selectedModule === 'Módulo II') {
            semestreSelect.innerHTML = '<option value="Semestre III Semestre IV">Semestre III Semestre IV</option>';
        } else if (selectedModule === 'Módulo III') {
            semestreSelect.innerHTML = '<option value="Semestre V Semestre VI">Semestre V Semestre VI</option>';
        }
    });
</script>
<?php require_once __DIR__ . '/../footer.php'; ?>
