<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consulta Pago</title>
    <link rel="stylesheet" href="../bling/css/style_pago.css">
</head>
<body>

<div class="container">
<form action="consulta_pago.php" method="get">
    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
    <input type="submit" value="Buscar">
    <label for="fecha_pago" class="form-label">Fecha de inico </label>
    <input type="date" name="fecha_inicio">
    <label for="fecha_pago" class="form-label">Fecha de final</label>
    <input type="date" name="fecha_fin">
</form>
    <h1>Consulta Pago</h1>

    <table>
        <tr>
            <th>Fecha de pago</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>

        <?php
        $conexion = mysqli_connect('localhost:3307', 'root', '', 'bling_o');

        if (!$conexion) {
             echo "Error: No se pudo conectar a la base de datos.";
             exit;
        }
        $sql = "SELECT * FROM pago ORDER BY fecha_pago DESC";
        $resultado = mysqli_query($conexion, $sql);
        
        if (mysqli_num_rows($resultado) == 0) {
        echo "<h1|>No hay pagos realizadas.</>";
        }
        while ($registro = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>{$registro['fecha_pago']}</td>";
            echo "<td>{$registro['total']}</td>";
            echo "<td><a href='mod_pago.html?id_pago={$registro['id_pago']}'>Modificar</a> | <a href='elim_pago.php?id_pago={$registro['id_pago']}' onclick='confirmarEliminar({$registro['id_pago']})'>Eliminar</a> </td><td> | <a href='detalles_pago.php?id_pago={$registro['id_pago']}'>Detalle</a></td>";
            echo "</tr>";
        }
        ?>
        <div>
        <tr>
        <td colspan="9">
        <a href="pago.php">Agregar pago</a>
</td>
</tr>
    </div>
    </table>
</div>
<script>
function confirmarEliminar(id_pago) {
  var respuesta = confirm("¿Está seguro de que desea eliminar este registro?");
  if (respuesta) {
    window.location.href = "elim_pago.php?id_pago=" + id_pago + "&confirmar=1";
  }
}
</script>
</body>
</html>
