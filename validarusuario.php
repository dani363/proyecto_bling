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
        $sql = " SELECT id_usuario, nombre, apellido,telefono,direccion,fecha_de_nacimiento,correo,estado,tipo_usuario FROM usuario";
        $resultado = mysqli_query($conectar, $sql);
    ?>

    <div class="pedido-container">
        <h1>MIS DATOS</h1>
        
        <table id="pedidosTable">
            <thead>
                <tr>
                    <th>ID USUARIO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TELEFONO</th>
                    <th>DIRECCION</th>
                    <th>FECHA NACIMIENTO</th>
                    <th>CORREO</th>
                    <th>ESTADO</th>
                    <th>TIPO USUARIO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($filas = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td><?php echo $filas['id_usuario'] ?></td>
                        <td><?php echo $filas['nombre'] ?></td>
                        <td><?php echo $filas['apellido'] ?></td>
                        <td><?php echo $filas['telefono'] ?></td>
                        <td><?php echo $filas['direccion'] ?></td>
                        <td><?php echo $filas['fecha_de_nacimiento'] ?></td>
                        <td><?php echo $filas['correo'] ?></td>
                        <td><?php echo $filas['estado'] ?></td>
                        <td><?php echo $filas['tipo_usuario'] ?></td>
                        <td>
                            <?php echo "<a href='editarU.php?id_usuario=" . $filas['id_usuario'] . "'>Editar</a>"; ?>
                            -
                            <?php echo "<a href='eliminarU.php?id_usuario=" . $filas['id_usuario'] . "' onclick='return confirmar()'>Eliminar</a>"; ?>
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
