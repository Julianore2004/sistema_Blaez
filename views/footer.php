<footer class="mt-auto py-3 bg-light">
    <div class="container">
        <p class="text-center text-muted">© 2023 Sistema de Inventario. Todos los derechos reservados.</p>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#categoria_select').change(function() {
      var categoria_id = $(this).val();
      $.ajax({
        url: 'views/inventario/filtrar.php',
        type: 'POST',
        data: { categoria_id: categoria_id },
        success: function(response) {
          $('.container.mt-4').html(response);
        }
      });
    });
  });
</script>
</body>
</html>
