<footer class="text-center py-3 mt-auto bg-dark text-white">
    <div class="container text-center">
        <div class="row" id="footer-des">
            <p>© 2024 Instituto de Educación Superior Tecnológico “Huanta”</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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



