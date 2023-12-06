<?php
// Verificar si se ha proporcionado el parámetro id_pedido
if(isset($_GET['id_detalles_pedido'])){
    $id_detalles_pedido = $_GET['id_detalles_pedido'];
    
    include("conexion.php");

    $sql = "DELETE FROM detalles_pedido WHERE id_detalles_pedido = '".$id_detalles_pedido."'";
    $resultado = mysqli_query($conectar, $sql);

    if($resultado){
        echo "<script language='javascript'>";
        echo "alert('Los datos se eliminaron correctamente');";
        echo "location.assign('validarpedido.php');";
        echo "</script>";
    } else {
        echo "<script language='javascript'>";
        echo "alert('Los datos NO se eliminaron correctamente');";
        echo "location.assign('validarpedido.php');";
        echo "</script>";
    }

    mysqli_close($conectar);
} else {
    echo "Error: No se proporcionó el ID del pedido a eliminar.";
}
?>
