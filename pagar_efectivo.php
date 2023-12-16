<?php



if (isset($_POST['cedula']) && isset($_POST['monto'])) {
  // Conectar a la base de datos
  $conexion = mysqli_connect('localhost', 'root', '', 'bling_o');


  if (!$conexion) {
    echo "Error: No se pudo conectar a la base de datos.";
    exit;
  }

  // Extraer los datos del formulario
  $cedula = $_POST['cedula'];
  $monto = $_POST['monto'];

  // Preparar la consulta SQL
  $sql = "INSERT INTO transacciones (cedula, monto)
  VALUES ('$cedula', '$monto')";

  // Ejecutar la consulta
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
    // Redireccionar a la página de lista de pagos
    header("Location: col_pago_list.php");
  } else {
    echo "Ocurrió un error al realizar el pago.";
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
} else {
  echo "Faltan datos por completar.";
}

?>

?>