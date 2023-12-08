<?php
// Conexión a la base de datos

$conexion = mysqli_connect('localhost:3307', 'root', '', 'bling_o');

if (!$conexion) {
echo "Error: No se pudo conectar a la base de datos.";
exit;
}


// Obtener los datos del formulario
$fecha_pago = $_POST['fecha_pago'];
$total = $_POST['total'];
$id_transaccion = $_POST['id_venta'];

// Validaciones
if (!is_numeric($total) || $total < 0) {
$_SESSION['error'] = "Ingrese un valor positivo para el total.";
header('Location: col_pago_list.php');
}
if (!is_numeric($id_transaccion) || $id_transaccion < 0) {
$_SESSION['error'] = "Ingrese un valor positivo para el id_transaccion.";
header('Location: col_pago_list.php');

}

// Si no hay errores, ejecutar la consulta SQL
if (empty($_SESSION['error'])) {
$sql = "INSERT INTO pago (fecha_pago, total, fk_id_venta) VALUES (?, ?, ?)";
$sentencia = $conexion->prepare($sql);
$sentencia->execute(array($fecha_pago, $total, $id_transaccion));
header('Location: col_pago_list.php');
// Mensaje de error
if (!empty($_SESSION['error'])) {
echo $_SESSION['error'];
header('Location: col_pago_list.php');
}
// Redirigir a la página principal
//header('Location: index.php');
header('Location: metodo_de_pago.php');
}
