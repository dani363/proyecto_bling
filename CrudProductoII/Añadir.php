<?php

include ("conexion.php");

$talla = $_POST["talla"];
$color = $_POST["color"];
$cantidad = $_POST["cantidad"];
$descripcion = $_POST["descripcion"];
$nombre = $_POST["nombre"];
$marca = $_POST["marca"];
$estado = $_POST["estado"];
$categorias = $_POST["categorias"];

$insertar = "INSERT INTO producto(talla,color,cantidad,descripcion,nombre,marca,estado,categorias)VALUES('$talla', '$color', '$cantidad', '$descripcion', '$nombre', '$marca', '$estado', '$categorias')";
$resultado = mysqli_query($conectar, $insertar);

if ($resultado === TRUE){
    header("location: visualizar.php");
}else{
 echo "Datos NO insertados";
}

?>
