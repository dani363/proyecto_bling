<?php
$conexion = mysqli_connect('localhost', 'root', '', 'bling_o');

if (!$conexion) {
     echo "Error: No se pudo conectar a la base de datos.";
     exit;
}
?>