<?php
include("conexion.php");
include("pago.php");

// Obtener el ID de venta desde la URL
$idVenta = $_POST["id_venta"];

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $fechaPago = $_POST["fecha_pago"];
    $totalCalculado = calcularTotal(); // Asegúrate de tener definida la función 'calcularTotal'

    // Actualizar el estado de la venta a "realizado"
    $sqlActualizarEstado = "UPDATE venta SET estado = 'realizado' WHERE id_venta = $idVenta";

    if (mysqli_query($conexion, $sqlActualizarEstado)) {
        echo "Estado de venta actualizado a 'realizado' con éxito.";
    } else {
        echo "Error al actualizar el estado de la venta: " . mysqli_error($conexion);
    }

    // Realizar la inserción en la base de datos
    $sqlInsercion = "INSERT INTO pago (fecha_pago, total, fk_id_venta) VALUES ('$fechaPago', $totalCalculado, $idVenta)";

    if (mysqli_query($conexion, $sqlInsercion)) {
        echo "Pago creado con éxito.";
        header("location: col_pago_list.php");
    } else {
        echo "Error al crear el pago: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
