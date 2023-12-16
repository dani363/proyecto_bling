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
        <h1 class="card-title">Crear Pago</h1>
      </div>
      <div class="card-body">
        <?php
        // Connect to the database
        $mysqli = new mysqli('localhost', 'root', '', 'bling_o');

        // Check connection
        if ($mysqli->connect_error) {
          die('Connection failed: ' . $mysqli->connect_error);
        }

        // Get the latest sale ID using a database query
        $sql = "SELECT id_venta FROM venta ORDER BY id_venta DESC LIMIT 1";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        $latestSaleID = $row['id_venta'];

        // Close the database connection
        $mysqli->close();
        ?>

        <form action="crear-pago.php" method="post">
          <div class="mb-3">
            <label for="fecha_pago" class="form-label">Fecha de Pago</label>
            <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" required>
          </div>
          <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" class="form-control" id="total" name="total" required>
          </div>
          <div class="mb-3">
            <label for="id_venta" class="form-label">ID de la Venta </label>
            <input type="number"  id="id_venta" name="id_venta" value="<?php echo $latestSaleID; ?>">
          </div>
          <button type="submit" class="btn btn-primary">Crear Pago</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/5H6yQ3+o" crossorigin="anonymous"></script>
</body>
</html>
