<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style_pago.css">
    <style>
    
    .volver-btn {
  background-color: white;
  color: darkblue;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  display: inline-block;
  margin-top: 20px;
}
  </style>
</head>
<body>
<?php
 include('conexion.php');

  if (!$conexion) {
    echo "Error: No se pudo conectar a la base de datos.";
    exit;
  }

  $sql = "SELECT * FROM pago ORDER BY fecha_pago DESC";
  $resultado = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($resultado) == 0) {
    echo "<h1>No hay pagos realizadas.</>";
  }

  echo "<table>";
  echo "<tr>";
  echo "<th>Fecha de pago</th>";
  echo "<th>Total</th>";
  echo "</tr>";

  while ($registro = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>{$registro['fecha_pago']}</td>";
    echo "<td>{$registro['total']}</td>";
    echo "</tr>";
  }

  echo "</table>";
?>
<a href="./ventas_list.php" class="volver-btn">Volver</a>
</body>
</html>


