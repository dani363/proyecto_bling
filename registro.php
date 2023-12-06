<?php
require "conexion.php";

// Recuperar las variables
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$fecha_de_nacimiento = $_POST["fecha"];
$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];
$cod_vendedor = isset($_POST["cod_vendedor"]) ? $_POST["cod_vendedor"] : "";
$estado = "Activo";
$cliente = 2;
$vendedor = 1;
$tipo_usuario = isset($_POST["esVendedor"]) ? $vendedor : $cliente;

// Verificar si el correo ya está registrado
$verificarCorreo = "SELECT COUNT(*) as total FROM usuario WHERE correo = '$correo'";
$queryVerificarCorreo = mysqli_query($conectar, $verificarCorreo);
$resultadoVerificarCorreo = mysqli_fetch_assoc($queryVerificarCorreo);

if ($resultadoVerificarCorreo['total'] > 0) {
    echo "El correo ya está registrado. Por favor, elija otro correo.";
} else {
    // Cifrar la contraseña
    $contraseñaCifrada = password_hash($contraseña, PASSWORD_DEFAULT);

    // Insertar el usuario si el correo no está registrado
    $insertusuario = "INSERT INTO usuario (nombre, apellido, telefono, direccion, fecha_de_nacimiento, correo, contraseña, estado, tipo_usuario, fk_id_rol) VALUES ('$nombre', '$apellido', '$telefono', '$direccion', '$fecha_de_nacimiento', '$correo', '$contraseñaCifrada', '$estado', '$tipo_usuario','$tipo_usuario')";
    $queryusuario = mysqli_query($conectar, $insertusuario);

    if ($queryusuario) {
        $idGeneradousuario = mysqli_insert_id($conectar);
        echo "Usuario registrado exitosamente ID: $idGeneradousuario y tipo de usuario: $tipo_usuario <br><br>";

        // Creamos la sentencia SQL para guardar vendedor
        if ($tipo_usuario == 1) {
            $insertVendedor = "INSERT INTO vendedor (cod_vendedor,fk_id_usuario) VALUES('$cod_vendedor','$idGeneradousuario')";
            $queryVendedor = mysqli_query($conectar, $insertVendedor);
            $idGeneradoVendedor = mysqli_insert_id($conectar);
            echo "Vendedor registrado correctamente ID: $idGeneradoVendedor <br><br>";
            echo "Codigo vendedor: $cod_vendedor <br><br>";
        }
    } else {
        echo "Error al registrarse ";
    }
}
?>
