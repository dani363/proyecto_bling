<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_producto = $_GET['id'];

    // 1. Eliminar detalles asociados al producto
    $eliminar_detalles = "DELETE FROM detalles_pedido WHERE fk_id_producto = $id_producto";
    $resultado_detalles = mysqli_query($conectar, $eliminar_detalles);

    // 2. Eliminar el producto
    $eliminar_producto = "DELETE FROM producto WHERE id_producto = $id_producto";
    $resultado_producto = mysqli_query($conectar, $eliminar_producto);

    if ($resultado_detalles && $resultado_producto) {
        // Ambas operaciones se realizaron con éxito
        header("Location: visualizar.php");
        exit();
    } else {
        // Alguna operación falló
        echo '<div class="alert alert-danger" role="alert">Error al intentar eliminar el producto.</div>';
    }
} else {
    // ID de producto no válido o no se recibió correctamente
    echo '<div class="alert alert-danger" role="alert">ID de producto no válido.</div>';
}
?>