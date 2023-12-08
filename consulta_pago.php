<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bling/css/style_pago.css">
</head>
<body>
<?php
// Obtener los datos del formulario

$busqueda = $_GET['busqueda'];
$fecha_inicio = $_GET['fecha_inicio'];
$fecha_fin = $_GET['fecha_fin'];
$conexion = mysqli_connect('localhost:3307', 'root', '', 'bling_o');

if (!$conexion) {
echo "Error: No se pudo conectar a la base de datos.";
exit;}
// Consulta SQL
$sql = "SELECT * FROM pago WHERE
fecha_pago LIKE '%{$busqueda}%' OR
total LIKE '%{$busqueda}%' OR
fecha_pago BETWEEN '{$fecha_inicio}' AND '{$fecha_fin}'
ORDER BY fecha_pago DESC";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Comprobar si la consulta se ha ejecutado correctamente
if ($resultado) {
while ($registro = mysqli_fetch_assoc($resultado)) {
// Mostrar los datos del registro
echo "<tr>";
echo "<td>{$registro['fecha_pago']}</td>";
echo "<td>{$registro['total']}</td>";
echo "<td><a href='mod_pago.html?id_pago={$registro['id_pago']}'>Modificar</a> | <td><a href='elim_pago.php?id_pago={$registro['id_pago']}'>Eliminar</a></td>";
echo "</tr><br>";
}
} else {
echo "Error: No se pudo obtener los datos de la base de datos.";
}
?>
</body>
</html>


