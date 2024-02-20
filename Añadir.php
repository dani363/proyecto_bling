<?php

include ("conexion.php");

$talla = $_POST["talla"];
$color = $_POST["color"];
$cantidad = $_POST["cantidad"];
$descripcion = $_POST["descripcion"];
$nombre = $_POST["nombre"];
$nombre_marca = $_POST["nombre_marca"];
$estado = $_POST["estado"];
$categorias = $_POST["categorias"];

$insertar = "INSERT INTO producto(talla,color,cantidad,descripcion,nombre,estado,categorias)VALUES('$talla', '$color', '$cantidad', '$descripcion', '$nombre', '$estado', '$categorias')";
$resultado = mysqli_query($conectar, $insertar);

$consultaid = "select id_producto from producto where talla = '$talla' and color = '$color' and cantidad = '$cantidad' and descripcion = '$descripcion' and nombre = '$nombre' and estado = '$estado' and categorias = '$categorias'";
$resultadoid = mysqli_query($conectar, $consultaid);

    // Obtener el valor directamente
    $row = $resultadoid->fetch_assoc();
    $valor = $row["id_producto"];

    echo "Valor encontrado: " . $valor;
    echo "Valor marca: " . $nombre_marca;
$insertar2 = "INSERT INTO marca_producto(fk_id_producto, fk_id_marca)VALUES($valor,$nombre_marca)";
$resultado2 = mysqli_query($conectar, $insertar2);

header("Location: visualizar.php");
?>
