<head>
  <meta charset="UTF-8">
  <title>Listar ventas</title>
  <link rel="stylesheet" href="../bling/css/style_pago.css">
</head>
<body>

<div class="container">
<form action="listar_ventas.php" method="post">
  <input type="text" name="busqueda" placeholder="Buscar">
  <input type="submit" value="Buscar">
</form>

<h1>Listado de ventas</h1>

<table>
  <tr>
    <th>Estado</th>
    <th>Fecha</th>
    <th>Total cantidad</th>
    <th>Total venta</th>
    <th>cod.Vendedor</th>
    <th>nom.Vendedor</th>
  </tr>

  <?php

include("conexion2.php");

// Variables
$busqueda = "";
$estado = "";
$fecha_inicio = "";
$cod_vendedor = "";

// Obtener los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $busqueda = $_POST['busqueda'];
  $estado = $_POST['estado'];
  $fecha_inicio = $_POST['fecha_inicio'];
  $cod_vendedor = $_POST['cod_vendedor'];
}


// Consulta SQL
$sql = "SELECT id_venta, estado, fecha, Total_cantidad, Total_venta, cod_vendedor, nombre
FROM venta
INNER JOIN vendedor ON venta.fk_cod_vendedor = vendedor.cod_vendedor
INNER JOIN usuario  ON vendedor.fk_id_usuario = usuario.id_usuario
WHERE 1 = 1";

if ($busqueda != "") {
  $sql .= " AND id_venta LIKE '%$busqueda%' OR estado LIKE '%$busqueda%' OR fecha LIKE '%$busqueda%' OR Total_cantidad LIKE '%$busqueda%' OR Total_venta LIKE '%$busqueda%' OR cod_vendedor LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%'";
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
  echo "<tr>";
  echo "<td>{$registro['id_venta']}</td>";
  echo "<td>{$registro['estado']}</td>";
  echo "<td>{$registro['fecha']}</td>";
  echo "<td>{$registro['Total_cantidad']}</td>";
  echo "<td>{$registro['Total_venta']}</td>";
  echo "<td>{$registro['cod_vendedor']}</td>";
  echo "<td>{$registro['nombre']}</td>";
  echo "<td><a href='elim_venta.php?id_venta={$registro['id_venta']}' onclick='confirmarEliminar({$registro['id_venta']})'>Eliminar</a> </td><td> | <a href='detalles_pago.php?id_pago={$registro['id_venta']}'>Detalle</a></td>";
  echo "</tr>";
}

?>
  <form action="col_pago.php" method="get">
  
  <input type="submit" value="Buscar">
  <input type="button" value="Ver reporte" onclick="window.location.href='col_pago.php'">
</form>
</table>



    <a href="crear_venta.php " class="volver-btn">Agregar venta</a>
    <a href="../Bling/menu.html" class="volver-btn">Volver</a>


  </div>
  <script>
function confirmarEliminar(id_venta) {
  var respuesta = confirm("¿Está seguro de que desea eliminar este registro?");
  if (respuesta) {
    window.location.href = "elim_venta.php?id_venta=" + id_venta + "&confirmar=1";
  }
}
</script>
</body>
</html>