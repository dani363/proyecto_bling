<?php
$conexion = mysqli_connect('localhost', 'root', '', 'bling_o');

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

// Obtener la lista de ventas
$sql = "SELECT id_venta FROM venta";
$resultado = mysqli_query($conexion, $sql);

// Validar que el ID de la venta exista
if (mysqli_num_rows($resultado) == 0) {
$_SESSION['error'] = "No existen ventas registradas.";
header('Location: col_pago_list.php');
}

// Verificar que el ID de la venta sea válido
foreach ($resultado as $registro) {
if ($id_transaccion == $registro['id_venta']) {
break;
}
}

if ($id_transaccion == $registro['id_venta']) {
// Si el ID de la venta es válido, ejecutar la consulta SQL
$sql = "INSERT INTO pago (fecha_pago, total, fk_id_venta) VALUES (?, ?, ?)";
$sentencia = $conexion->prepare($sql);
$sentencia->execute(array($fecha_pago, $total, $id_transaccion));
// Redirigir a la página principal
header('Location: col_pago_list.php');
} else {
// Si el ID de la venta no es válido, mostrar un mensaje de error
$_SESSION['error'] = "El ID de la venta no es válido.";
header('Location: col_pago_list.php');
}
