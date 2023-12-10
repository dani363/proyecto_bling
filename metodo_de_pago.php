<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Pago</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA0YxHsigenqhZt4xbs/8AYY6H9snk5v4cQ4Vzd5dECcUGbZ30G6y41T7yyQ" crossorigin="anonymous">
  <link rel="stylesheet" href="../bling/css/style_pago.css">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h1 class="card-title">Metodo de Pago</h1>
      </div>
      <div class="card-body">
        <form action="./col_pago_list.php" method="post">
          <label for="exampleDataList" class="form-label">Escoge el método de pago:</label>
          <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Seleccionar opción" name="metodo_pago" required>
          <datalist id="datalistOptions">
            <option value="efectivo">Efectivo</option>
            <option value="tarjeta">Tarjeta de crédito/débito</option>
          </datalist>

          <div id="formulario-efectivo" style="display: none;">
            <?php include 'pago_efectivo_form.php'; ?>
          </div>

          <div id="formulario-tarjeta" style="display: none;">
            <?php include 'pago_tarjeta_form.php'; ?>
          </div>

          
        </form>
      </div>
    </div>
  </div>

  <script src="../bling/js/jquery.js"></script>
  <script>
    $(document).ready(function() {
      // Mostrar u ocultar el formulario correspondiente según el método de pago seleccionado
      $("#exampleDataList").change(function() {
        const metodoPago = $(this).val();

        $("#formulario-efectivo").hide();
        $("#formulario-tarjeta").hide();

        if (metodoPago === "efectivo") {
          $("#formulario-efectivo").show();
        } else if (metodoPago === "tarjeta") {
          $("#formulario-tarjeta").show();
        }
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/5H6yQ3+o" crossorigin="anonymous"></script>
</body>
</html>
