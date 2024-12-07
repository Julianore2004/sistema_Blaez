document.addEventListener('DOMContentLoaded', function() {
    const categoriaSelect = document.getElementById('categoria');
    const inventarioTable = document.getElementById('inventario-table');

    categoriaSelect.addEventListener('change', function() {
        const categoriaId = categoriaSelect.value;
        fetchInventario(categoriaId);
    });

    function fetchInventario(categoriaId) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `index.php?action=filtrar_inventario&categoria_id=${categoriaId}`, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                inventarioTable.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    // Cargar el inventario inicial
    fetchInventario('');
});
