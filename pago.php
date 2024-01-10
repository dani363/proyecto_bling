<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Pago</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA0YxHsigenqhZt4xbs/8AYY6H9snk5v4cQ4Vzd5dECcUGbZ30G6y41T7yyQ" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style_pago.css">
</head>
<body> 
  <div class="container mt-5">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h1 class="card-title">Crear Pago</h1>
      </div>
      <div class="card-body">
        <?php
        // Connect to th e database
        include("conexion.php");
        $sql = "SELECT MAX(id_venta) AS latestSaleID FROM venta";
        $resultado = mysqli_query($conexion, $sql);
        
        if ($resultado) {
            $registro = mysqli_fetch_assoc($resultado);
            $latestSaleID = $registro['latestSaleID'];
            
            // Ahora tienes el último ID de venta en $latestSaleID
        } else {
            // Manejar el error de la consulta
            echo "Error en la consulta: " . mysqli_error($conexion);
        }
        // Close the database connection
        ?>

        <form action="crear-pago.php" method="post">
          <div class="mb-3">
            <label for="fecha_pago" class="form-label">Fecha de Pago</label>
            <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" required>
          </div>
          
          <div class="mb-3">
            <label for="total" class="form-label">Total Calculado</label>
            <?php $totalCalculado = calcularTotal(); echo '<p>' . $totalCalculado . '</p>';?>
          </div>

          <div class="mb-3">
            <label for="id_venta" class="form-label">ID de la Venta </label>
            <input type="number" id="id_venta" name="id_venta" value="<?php echo $latestSaleID; ?>" readonly style="background-color: #e9ecef; cursor: not-allowed;">
          </div>
          <button type="submit" class="btn btn-primary">Crear Pago</button>
        </form>
      </div>
    </div>
  </div>
  <?php
function calcularTotal()
{
    // Connect to the database
    include("conexion.php");

    // Obtener el último ID de venta
    $sqlVenta = "SELECT MAX(id_venta) AS latestSaleID FROM venta";
    $resultadoVenta = mysqli_query($conexion, $sqlVenta);

    if ($resultadoVenta) {
        $registroVenta = mysqli_fetch_assoc($resultadoVenta);
        $latestSaleID = $registroVenta['latestSaleID'];
    } else {
        // Manejar el error de la consulta
        echo "Error en la consulta: " . mysqli_error($conexion); 
    }

    // Obtener la información de productos de la última venta
    $sqlProductos = "SELECT Total_cantidad, precio_unitario
    FROM producto 
    INNER JOIN venta  ON producto.fk_id_venta = venta.id_venta
    WHERE venta.id_venta = (SELECT MAX(id_venta) FROM venta)";

    $resultadoProductos = mysqli_query($conexion, $sqlProductos);

    if ($resultadoProductos) {
        // Calcular el total
        $totalCalculado = 0;

        while ($producto = mysqli_fetch_assoc($resultadoProductos)) {
          $totalCalculado += $producto['Total_cantidad'] * $producto['precio_unitario'];
      }

        return $totalCalculado; 
    } else {
        // Manejar el error de la consulta
        echo "Error en la consulta: " . mysqli_error($conexion);
        return 0; // O el valor que consideres adecuado en caso de error
    }

    // Close the database connection
    mysqli_close($conexion);
    return $totalCalculado;
}
?> 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/5H6yQ3+o" crossorigin="anonymous"></script>
</body>
</html>
