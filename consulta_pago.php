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
include('conexion.php');
// Consulta SQL
$sql = "SELECT id_venta, estado, fecha, Total_cantidad, cod_vendedor
        FROM venta
        INNER JOIN vendedor ON venta.fk_cod_vendedor = vendedor.id_vendedor
        WHERE (id_venta LIKE '%$busqueda%' 
               OR estado LIKE '%$busqueda%' 
               OR fecha LIKE '%$busqueda%' 
               OR Total_cantidad LIKE '%$busqueda%'
               OR id_vendedor LIKE '%$busqueda%')";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Comprobar si la consulta se ha ejecutado correctamente
if ($resultado) {
while ($registro = mysqli_fetch_assoc($resultado)) {
// Mostrar los datos del registro
echo "<tr>";
echo "<td>{$registro['fecha_pago']}</td>";
echo "<td>{$registro['total']}</td>";
echo "<td><a href='mod_pago.html?id_pago={$registro['id_pago']}'>Modificar</a> | <a href='elim_pago.php?id_pago={$registro['id_pago']}' onclick='confirmarEliminar({$registro['id_pago']})'>Eliminar</a> | <a href='detalles_pago.php?id_pago={$registro['id_pago']}'>Detalle</a></td>";
echo "</tr><br>";
}
} else {
echo "Error: No se pudo obtener los datos de la base de datos.";
}
?>
</body>
</html>


