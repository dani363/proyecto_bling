<?php

//conexion al servidor
$host = "localhost";
$user = "root";
$clave = "";
$bd = "bling_o";
$port = "3307";

$conectar = mysqli_connect($host, $user, $clave, $bd, $port);
if (!$conectar){
    echo 'La conexion se ha interrumpido o no se compelto';

}
$conexion = mysqli_connect($host, $user, $clave, $bd, $port);
if (!$conexion){
    echo 'La conexion se ha interrumpido o no se compelto';
    
}
$mysqli = new mysqli($host, $user, $clave, $bd ,$port );

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}
?>