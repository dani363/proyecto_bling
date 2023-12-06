<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="css/estilopedido.css">
</head>
<body>

<?php
include("conexion.php");

if(isset($_POST['enviar'])){
    // Si se ha enviado el formulario
    $id_usuario = $_POST["id_usuario"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];

    // Construir la consulta SQL de actualización correctamente
    $sql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion' WHERE id_usuario = '$id_usuario'";

    $resultado= mysqli_query($conectar,$sql);

    if($resultado){
        echo "<script language='javascript'>";
        echo "alert('Los datos se actualizaron correctamente');";
        echo "location.assign('validarusuario.php');";
        echo "</script>";
    } else {
        echo "<script language='javascript'>";
        echo "alert('Los datos NO se actualizaron correctamente');";
        echo "location.assign('validarusuario.php');";
        echo "</script>";
    }
    mysqli_close($conectar);

} else {
    // Si no se ha enviado el formulario
    if(isset($_GET['id_usuario'])){
        $id_usuario = $_GET['id_usuario'];
        $sql = "SELECT id_usuario, nombre, apellido, telefono, direccion, fecha_de_nacimiento, correo, estado, tipo_usuario FROM usuario
                WHERE usuario.id_usuario = '$id_usuario'";
        $resultado = mysqli_query($conectar, $sql);

        if($resultado && mysqli_num_rows($resultado) > 0){
            $usuario = mysqli_fetch_assoc($resultado);
            $nombre= $usuario['nombre'];
            $apellido= $usuario['apellido'];
            $telefono = $usuario['telefono'];
            $direccion= $usuario['direccion'];
        } else {
            echo "Error al recuperar datos de la base de datos.";
        }
    } else {
        echo "Error: No se proporcionó el ID del usuario a editar.";
        exit; // Termina el script si no hay ID de usuario
    }
}
?>
    <div class="pedido-container">
        <h1> EDITAR USUARIO</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
            <p><strong>ID Usuario:</strong><?php echo $usuario['id_usuario']; ?></p>
            <label><strong>Nombre:</strong></label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br><br>
            <label><strong>Apellido:</strong></label>
            <input type="text" name="apellido" value="<?php echo $apellido; ?>"><br><br>
            <label><strong>Telefono:</strong></label>
            <input type="text" name="telefono" value="<?php echo $telefono; ?>"><br><br>
            <label><strong>Direccion:</strong></label>
            <input type="text" name="direccion" value="<?php echo $direccion; ?>"><br><br>
            <p><strong>Fecha Nacimiento:</strong><?php echo $usuario['fecha_de_nacimiento']; ?></p>
            <p><strong>Correo:</strong><?php echo $usuario['correo']; ?></p>
            <p><strong>Estado:</strong><?php echo $usuario['estado']; ?></p>
            <p><strong>Tipo Usuario:</strong><?php echo $usuario['tipo_usuario']; ?></p>
            <input type="submit" name="enviar" value="ACTUALIZAR">
            <a href="validarusuario.php">Regresar</a>  
        </form>
    </div>
</body>
</html>
