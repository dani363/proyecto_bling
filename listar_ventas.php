<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bling/css/style_pago.css">
</head>
<body>
    <div class="container"></div>
<?php

include("conexion.php");
include("ventas_list.php");

// Obtener los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $busqueda = $_POST['busqueda'];
}

// Consulta SQL
$sql = "SELECT id_venta, estado, fecha, Total_cantidad, cod_vendedor
FROM venta
INNER JOIN vendedor ON venta.fk_cod_vendedor = vendedor.id_vendedor
WHERE 1"; // Agrega un 1 para que puedas concatenar condiciones sin preocuparte por el "AND" inicial

if ($busqueda != "") {
  $sql .= " AND (id_venta LIKE '%$busqueda%' OR estado LIKE '%$busqueda%' OR fecha LIKE '%$busqueda%' OR Total_cantidad LIKE '%$busqueda%' OR Total_venta LIKE '%$busqueda%' OR id_vendedor LIKE '%$busqueda%')";
}

if ($estado != "") {
  $sql .= " AND estado = '$estado'";
}

if ($fecha_inicio != "" && $fecha_fin != "") {
  $sql .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
}

if ($cod_vendedor != "") {
  $sql .= " AND cod_vendedor = '$cod_vendedor'";
}

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) == 0) {
  echo "<h1>No hay registros encontrados.</>";
}

while ($registro = mysqli_fetch_assoc($resultado)) {
    echo "<table>";
    echo "<tr>";
    echo "<td>{$registro['id_venta']}</td>";
    echo "<td>{$registro['estado']}</td>";
    echo "<td>{$registro['fecha']}</td>";
    echo "<td>{$registro['Total_cantidad']}</td>";
    echo "<td><a href='elim_venta.php?id_venta={$registro['id_venta']}' onclick='confirmarEliminar({$registro['id_venta']})'>Eliminar</a> </td><td> <a href='detalles_pago.php?id_pago={$registro['id_venta']}'>Detalle</a></td>";
    echo "<td><a href='ruta_al_archivo.pdf' download='nombre_del_archivo.pdf'>Descargar</a></td>";
    echo "</tr>";
    echo "</table>";
   $nombre_del_archivo = "porte_ventas.pdf";
   
}

?>
<a href="./ventas_list.php" class="volver-btn">Volver</a>
</div>
</body>
</html>