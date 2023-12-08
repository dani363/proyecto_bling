<?php
$conexion = mysqli_connect('localhost:3307', 'root', '', 'bling_o');

if (!$conexion) {
echo "Error: No se pudo conectar a la base de datos.";
exit;
}
 
// Obtener los datos del formulario
$cedula = $_POST['cedula'] ?? null;
$monto = $_POST['monto'] ?? null;
$nombre_propietario = $_POST['nombre_propietario'] ?? null;
$metodo_pago = $_POST['metodo_pago'] ?? null;
$numero_Tarjeta = $_POST['numero_Tarjeta'] ?? null;
$codigo_seguridad = $_POST['codigo_seguridad'] ?? null;
$fecha_vencimiento = $_POST['fecha_vencimiento'] ?? null;

// Validar los datos del formulario
if (empty($cedula)) {
echo "Debe ingresar la cédula.";
exit;
}

if (empty($monto)) {
echo "Debe ingresar el monto.";
exit;
}

// Generar la consulta SQL
$sql = "INSERT INTO transacciones (cedula, monto, nombre_propietario, metodo_pago, numero_Tarjeta, codigo_seguridad, fecha_vencimiento)
VALUES ('{$cedula}', '{$monto}', '{$nombre_propietario}', '{$metodo_pago}', '{$numero_Tarjeta}', '{$codigo_seguridad}', '{$fecha_vencimiento}')";

// Ejecutar la consulta SQL
$resultado = mysqli_query($conexion, $sql);

// Si la consulta se ejecutó correctamente
if ($resultado) {
  // Generar el reporte
 $reporte = generar_reporte($cedula, $monto);

 header("Location: col_pago_list.php");

 echo $reporte;
} else {
 echo "Ocurrió un error al realizar el pago.";
}


?>