<head>
  <meta charset="UTF-8">
  <title>Listar ventas</title>
  <link rel="stylesheet" href="./css/style_pago.css">
</head>
<body>

<div class="container">
<form action="listar_ventas.php" method="post">
  <input type="text" name="busqueda" placeholder="Buscar">
  
  <label for="estado">Estado:</label>
  <select name="estado" id="estado">
    <option value="pendiente">Pendiente</option>
    <option value="realizado">Realizado</option>
    
  </select>

  <label for="fecha_inicio">Fecha Inicio:</label>
  <input type="date" name="fecha_inicio">

  <label for="fecha_fin">Fecha Fin:</label>
  <input type="date" name="fecha_fin">

  <label for="id_vendedor">Código Vendedor:</label>
  <input type="text" name="id_vendedor">

  <input type="submit" value="Buscar">
</form>
<a href="./menuV.html" class="volver-btn">Volver</a>
<h1>Listado de ventas</h1>

<table>
  <tr>
    <th>Estado</th>
    <th>Fecha</th>
    <th>Total cantidad</th> 

    <th>codigo vendedor</th>
    <th>Eliminar</th>
    <th>Modificar</th>
    <th>Detalles</th>
  </tr>

  <?php

include("conexion.php");

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
  $cod_vendedor = $_POST['id_vendedor'];
}


// Consulta SQL
$sql = "SELECT id_venta, estado, fecha, Total_cantidad, cod_vendedor
FROM venta
INNER JOIN vendedor ON venta.fk_cod_vendedor = vendedor.id_vendedor";

if ($busqueda != "") {
  $sql .= " AND id_venta LIKE '%$busqueda%' OR estado LIKE '%$busqueda%' OR fecha LIKE '%$busqueda%' OR Total_cantidad LIKE '%$busqueda%' OR Total_venta LIKE '%$busqueda%' OR id_vendedor LIKE '%$busqueda%'";
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
  echo "<td>{$registro['estado']}</td>";
  echo "<td>{$registro['fecha']}</td>";
  echo "<td>{$registro['Total_cantidad']}</td>";
  echo "<td>{$registro['cod_vendedor']}</td>";
  echo "<td><a href='elim_venta.php?id_venta={$registro['id_venta']}' onclick='confirmarEliminar({$registro['id_venta']})'>Eliminar</a></td>";
  echo "<td><a href='modificar_venta.php?id_venta={$registro['id_venta']}'>Modificar</a></td>";
  echo "<td><a href='pago.php?id_pago={$registro['id_venta']}'>Pagar</a></td>";
  echo "</tr>";
}

?>
  <form action="col_pago.php" method="get">
  
  <input type="button" value="Ver reporte" onclick="window.location.href='col_pago.php'">
</form>
</table>



    <a href="crear_venta.php " class="volver-btn">Agregar venta</a>
   
    <a href="col_pago_list.php" class="volver-btn">pagos realizados</a>


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