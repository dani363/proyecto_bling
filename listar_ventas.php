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

include("conexion2.php");

// Obtener los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $busqueda = $_POST['busqueda'];
}

// Consulta SQL
$sql = "SELECT id_venta, estado, fecha, Total_cantidad, Total_venta, cod_vendedor, nombre
FROM venta
INNER JOIN vendedor ON venta.fk_cod_vendedor = vendedor.cod_vendedor
INNER JOIN usuario ON vendedor.fk_id_usuario = usuario.id_usuario
WHERE id_venta LIKE '%$busqueda%' OR estado LIKE '%$busqueda%' OR fecha LIKE '%$busqueda%' OR Total_cantidad LIKE '%$busqueda%' OR Total_venta LIKE '%$busqueda%' OR cod_vendedor LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%'";

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
    echo "<td>{$registro['Total_venta']}</td>";
    echo "<td>{$registro['cod_vendedor']}</td>";
    echo "<td>{$registro['nombre']}</td>";
    echo "<td><a href='elim_venta.php?id_venta={$registro['id_venta']}' onclick='confirmarEliminar({$registro['id_venta']})'>Eliminar</a> </td><td> <a href='detalles_pago.php?id_pago={$registro['id_venta']}'>Detalle</a></td>";
    echo "<td><a href='ruta_al_archivo.pdf' download='nombre_del_archivo.pdf'>Descargar</a></td>";
    echo "</tr>";
    echo "</table>";
   $nombre_del_archivo = "porte_ventas.pdf";
   echo "<a href=\"$ruta_al_archivo\" download=\"$nombre_del_archivo\">Descargar</a>";
}

?>
<a href="./ventas_list.php" class="volver-btn">Volver</a>
</div>
</body>
</html>