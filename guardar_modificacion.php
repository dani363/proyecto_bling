<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_venta'])) {
    $id_venta = $_POST['id_venta'];
    $estado = $_POST['estado'];
    // Puedes agregar más campos aquí según tu estructura de base de datos

    // Actualizar la venta en la base de datos
    $sql = "UPDATE venta SET estado = '$estado' WHERE id_venta = $id_venta";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        // Redirigir de vuelta a la lista de ventas después de la actualización
        header("Location: ventas_list.php");
        exit();
    } else {
        echo "Error al actualizar la venta: " . mysqli_error($conexion);
    }
} else {
    echo "Error: Datos de formulario no válidos.";
}
?>