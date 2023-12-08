<?php

// Definir la variable $id_pago
$id_venta= $_GET['id_venta'];

// Conectar a la base de datos
$conexion = mysqli_connect('localhost:3307', 'root', '', 'bling_o');

if (!$conexion) {
echo "Error: No se pudo conectar a la base de datos.";
exit;
}

// Consulta SQL
$sql = "DELETE FROM transacciones WHERE id_transaccion
 = $id_venta";

$sql = "DELETE FROM pago WHERE id_pago = $id_venta";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Comprobar si la consulta se ha ejecutado correctamente
if ($resultado) {
$sql = "DELETE FROM venta WHERE id_venta = $id_venta";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
header('Location: ventas_list.php');
} else {
echo "No se pudo eliminar el registro.";
}
} else {
echo "No se pudo eliminar las transacciones.";
}

