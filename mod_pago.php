
<?php
session_start();

// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'bling_o');

if (!$conexion) {
    echo "Error: No se pudo conectar a la base de datos.";
    exit;
}

// Obtener los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha_pago = $_POST['fecha_pago'];
    $total = $_POST['total'];

    // Consulta SQL para la inserción
    $sql = "INSERT INTO pago (fecha_pago, total) VALUES ('$fecha_pago', $total)";
    
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);

    // Comprobar si la consulta se ha ejecutado correctamente
    if ($resultado) {
        // Validaciones
        if ($total < 0) {
            echo "El total debe ser un valor positivo.";
        } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha_pago)) {
            echo "La fecha de pago no es válida.";
        } else {
            // Redirigir después de realizar la inserción
            header('Location: col_pago_list.php');
            exit; // Asegúrate de salir después de una redirección
        }
    } else {
        echo "Error: No se pudo insertar el nuevo registro.";
    }
}

// Resto del código...
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modificar Pago</title>
  <link rel="stylesheet" href="../bling/css/style_pago.css">
</head>
<body>

<div class="container">
  <h1>Modificar Pago</h1>

  <?php
    // Obtener el ID del pago desde la URL
    $id_pago = isset($_GET['id_pago']) ? $_GET['id_pago'] : '';

    // Conectar a la base de datos y obtener la información del pago
    $conexion = mysqli_connect('localhost', 'root', '', 'bling_o');
    $sql = "SELECT * FROM pago WHERE id_pago = $id_pago";
    $resultado = mysqli_query($conexion, $sql);
    $pago = mysqli_fetch_assoc($resultado);

    // Mostrar el formulario de modificación
    if ($pago) {
  ?>
  <form action="./mod_pago_p.php" method="post">
    <div class="mb-3">
      <label for="fecha_pago" class="form-label">Fecha de pago</label>
      <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="<?php echo $pago['fecha_pago']; ?>" required>
    </div>
    <div class="mb-3">
      <label for="total" class="form-label">Total</label>
      <input type="number" class="form-control" id="total" name="total" value="<?php echo $pago['total']; ?>" required>
    </div>
    <div class="mb-3">
      <label for="id_pago" class="form-label">ID del pago</label>
      <!-- Mostrar el ID del pago en un campo no editable -->
      <input type="number" class="form-control" id="id_pago" name="id_pago" value="<?php echo $pago['id_pago']; ?>" disabled>
    </div>
    <button type="submit" class="btn btn-primary">Modificar</button>
  </form>
  <?php
    } else {
      echo "<p>No se encontró información para el pago con ID: $id_pago</p>";
    }
  ?>
</div>

</body>
</html>
