<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style_pago.css">
</head>
<body>
<a href="./ventas_list.php" class="volver-btn">Volver</a>
<?php

// Conectar a la base de datos
include('conexion.php');

// Obtener el ID del pago
$idPago = $_GET['id_pago'];

// Obtener los datos de la transacción
$sql = "SELECT * FROM transacciones WHERE fk_id_pago = $idPago";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<h1>Detalles de la transacción</h1>';
    echo '<table>';
    echo '<tr>';
    echo '<td>Nombre del propietario </td>';
    echo '<td>' . $row['nombre_propietario'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Método de pago</td>';
    echo '<td>' . $row['metodo_pago'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Cédula</td>';
    echo '<td>' . $row['cedula'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Número de tarjeta</td>';
    echo '<td>' . $row['numero_Tarjeta'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Código de seguridad</td>';
    echo '<td>' . $row['codigo_seguridad'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Fecha de vencimiento</td>';
    echo '<td>' . $row['fecha_vencimiento'] . '</td>';
    echo '</tr>';
    echo '</table>';
  }
} else {
  echo '<h1>No hay datos de transacción para este pago</h1>';
}



?>

</body>
</html>
