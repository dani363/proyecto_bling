<?php
$id_producto=$_GET['id_producto'];  
include("conexion.php");

$sql="DELETE FROM producto where id_producto = '".$id_producto."'";
$resultado= mysqli_query($conectar,$sql);

if($resultado){
    echo "<script language='javascript'>";
    echo "alert('Los datos se eliminaron correctamente');";
    echo "location.assign('validarpedido.php');";
    echo "</script>";
}else{
    echo "<script language='javascript'>";
    echo "alert('Los datos NO se eliminaron correctamente');";
    echo "location.assign('validarpedido.php');";
    echo "</script>";
}
?> 