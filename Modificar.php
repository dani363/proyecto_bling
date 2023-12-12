<?php
include("conexion.php");

$id_producto = $_GET['id'];
$talla = $_POST["talla"];
$color = $_POST["color"];
$cantidad = $_POST["cantidad"];
$descripcion = $_POST["descripcion"];
$nombre = $_POST["nombre"];
$marca = $_POST["marca"];
$estado = $_POST["estado"];
$categorias = $_POST["categorias"];

$modificar = "UPDATE producto SET talla = '$talla', color = '$color', cantidad = '$cantidad', descripcion = '$descripcion', nombre = '$nombre', marca = '$marca', estado = '$estado', categorias = '$categorias' WHERE id_producto = '$id_producto'";
$resultado = mysqli_query($conectar, $modificar);

if ($resultado === TRUE) {
    header("location: visualizar.php?success=true");
} else {
    header("location: visualizar.php?success=false");
}
?>




