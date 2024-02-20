<?php
include("conexion.php");

$id_producto = $_GET['id'];
$talla = $_POST["talla"];
$color = $_POST["color"];
$cantidad = $_POST["cantidad"];
$descripcion = $_POST["descripcion"];
$nombre = $_POST["nombre"];
$nombre_marca = $_POST["nombre_marca"];
$estado = $_POST["estado"];
$categorias = $_POST["categorias"];

$modificarproducto = "UPDATE producto SET talla = '$talla', color = '$color', cantidad = '$cantidad', descripcion = '$descripcion', nombre = '$nombre', estado = '$estado', categorias = '$categorias' WHERE id_producto = '$id_producto'";
$resultadoproducto = mysqli_query($conectar, $modificarproducto);
$modificarmarcaprod = "UPDATE marca_producto set fk_id_marca = $nombre_marca where fk_id_producto = $id_producto;";
$resultadomarcaprod = mysqli_query($conectar, $modificarmarcaprod);


if ($resultado === TRUE) {
    header("location: visualizar.php?success=true");
} else {
    header("location: visualizar.php?success=false");
}
?>




