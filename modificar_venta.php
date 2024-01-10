<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_venta'])) {
  $id_venta = $_GET['id_venta'];

  // Consulta para obtener los datos de la venta específica
  $sql = "SELECT * FROM venta WHERE id_venta = $id_venta";
  $resultado = mysqli_query($conexion, $sql);

  if ($registro = mysqli_fetch_assoc($resultado)) {
    // Mostrar el formulario con los datos prellenados
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Modificar Venta</title>
      <link rel="stylesheet" href="./css/style_pago.css">
    </head>
    <body>
      <h1>Modificar Venta</h1>
      <form action="guardar_modificacion.php" method="post">
        <input type="hidden" name="id_venta" value="<?php echo $id_venta; ?>">
        <label for="estado">Estado:</label>
        <select name="estado">
          <option value="pendiente" <?php echo ($registro['estado'] == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
          <option value="realizado" <?php echo ($registro['estado'] == 'realizado') ? 'selected' : ''; ?>>Realizado</option>
        </select>
        <input type="submit" value="Guardar cambios">
      </form>
    </body>
    </html>
<?php
  } else {
    echo "Error: No se encontró la venta con el ID especificado.";
  }
} else {
  echo "Error: No se proporcionó un ID de venta válido.";
}
?>
