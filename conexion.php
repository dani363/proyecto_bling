<?php

//conexion al servidor
$host = "localhost::3307";
$user = "root";
$clave = "";
$bd = "bling_o";

$conectar = mysqli_connect($host, $user, $clave, $bd);
if (!$conectar){
    echo 'La conexion se ha interrumpido o no se compelto';
}

?>