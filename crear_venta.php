<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bling/css/style_pago.css">
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

<label for="total_venta">Total venta:</label>
<input type="number" name="total_venta" id="total_venta">

<label for="id_vendedor">ID del vendedor:</label>
<select name="id_vendedor" id="id_vendedor">
  <option value="">Seleccione un vendedor</option>
  <?php
  $conexion = mysqli_connect('localhost', 'root', '', 'bling_o');
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
  $conexion = mysqli_connect('localhost', 'root', '', 'bling_o');
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  // Obtener los datos de los productos
  $sql = "SELECT id_producto, nombre, precio_unitario FROM producto";
  $resultado = mysqli_query($conexion, $sql);

  while ($registro = mysqli_fetch_assoc($resultado)) {
    echo "<option value=\"{$registro['id_producto']}\">{$registro['nombre']} - {$registro['precio_unitario']}</option>";
  }
  ?>
</select>


<input type="submit" value="pagar" onclick="pagar()">

</form>

</div>
<script>
function pagar() {
  // Obtener los datos del formulario
  const id_venta = document.querySelector('#id_venta').value;
  const estado = document.querySelector('#estado').value;

  // Actualizar el estado de la venta
  fetch('agregar_venta.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      id_venta,
      estado
    })
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('La venta se agregó correctamente.');
      } else {
        alert('Ocurrió un error al agregar la venta.');
      }
    });
}
</script>

</body>
</html>