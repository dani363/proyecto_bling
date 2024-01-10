<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style_pago.css">
</head>
<body>
<div class="container">

<form action="agregar_venta.php" method="post">

<h1>Agregar venta</h1>

<input type="hidden" name="estado" id ="estado" value="pendiente">

<label for="fecha">Fecha:</label>
<input type="date" name="fecha" id="fecha">

<label for="cantidad_total">Cantidad total:</label>
<input type="number" name="cantidad_total" id="cantidad_total">
 

<label for="id_vendedor">ID del vendedor:</label>
<select name="id_vendedor" id="id_vendedor">
  <option value="">Seleccione un vendedor</option>
  <?php
  include("conexion.php");
  // Obtener los datos de los vendedores
  $sql = "SELECT id_vendedor FROM vendedor";
  $resultado = mysqli_query($conexion, $sql);

  while ($registro = mysqli_fetch_assoc($resultado)) {
    echo "<option value=\"{$registro['id_vendedor']}\">{$registro['nombre']}</option>";
  }
  ?>
</select>

<label for="id_producto">Producto:</label>
<select name="id_producto" id="id_producto">
  <option value="">Seleccione un producto</option>
  <?php
  include("conexion.php");
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  // Obtener los datos de los productos
  $sql = "SELECT id_producto, nombre, precio_unitario FROM producto";
  $resultado = mysqli_query($conexion, $sql);

  while ($registro = mysqli_fetch_assoc($resultado)) {
    echo "<option value=\"{$registro['id_producto']}\">{$registro['nombre']} - {$registro['precio_unitario']}</option>";
  }
  ?>
</select>
<input type="hidden" name="total_calculado" id="total_calculado" value="0">
<input type="submit" value="Agregar venta" onclick="pagar()">

</form>

</div>
</body>
</html>