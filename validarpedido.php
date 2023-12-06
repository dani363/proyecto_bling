<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
    <?php
        include("conexion.php");
        $sql = "SELECT * FROM pedido
            INNER JOIN detalles_pedido ON pedido.id_pedido = detalles_pedido.fk_id_pedido
            INNER JOIN producto ON detalles_pedido.fk_id_producto = producto.id_producto";
        $resultado = mysqli_query($conectar, $sql);
    ?>

    <div class="pedido-container">
        <h1>Lista de Pedidos</h1>
        
        <table id="pedidosTable">
            <thead>
                <tr>
                    <th>ID PEDIDO</th>
                    <th>ID USUARIO</th>
                    <th>FECHA</th>
                    <th>SITUACION</th>
                    <th>NOMBRE</th>
                    <th>UNIDADES</th>
                    <th>PRECIO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($filas = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td><?php echo $filas['id_pedido'] ?></td>
                        <td><?php echo $filas['fk_id_usuario'] ?></td>
                        <td><?php echo $filas['fecha'] ?></td>
                        <td><?php echo $filas['situacion'] ?></td>
                        <td><?php echo $filas['nombre'] ?></td>
                        <td><?php echo $filas['unidades'] ?></td>
                        <td><?php echo $filas['precio_unitario'] ?></td>
                        <td>
                            <?php echo "<a href='editar.php?id_detalles_pedido=" . $filas['id_detalles_pedido'] . "'>Editar</a>"; ?>
                            -
                            <?php echo "<a href='eliminarr.php?id_detalles_pedido=" . $filas['id_detalles_pedido'] . "' onclick='return confirmar()'>Eliminar</a>"; ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <a href="menuV.html">Volver</a><br><br>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#pedidosTable').DataTable();
        });
    </script>
</body>
</html>
