<?php

// Definir la variable $id_pago
$id_pago = $_GET['id_pago'];

// Conectar a la base de datos
$conexion = mysqli_connect('localhost:3307', 'root', '', 'bling_o');

if (!$conexion) {
echo "Error: No se pudo conectar a la base de datos.";
exit;
}

// Consulta SQL
$sql = "DELETE FROM transacciones WHERE id_pago = $id_pago";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Comprobar si la consulta se ha ejecutado correctamente
if ($resultado) {
$sql = "DELETE FROM pago WHERE id_pago = $id_pago";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
header('Location: col_pago_list.php');
} else {
echo "No se pudo eliminar el registro.";
}
} else {
echo "No se pudo eliminar las transacciones.";
}

