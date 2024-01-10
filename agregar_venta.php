<?php
include("conexion.php");

if (!$conexion) {
    echo "Error: No se pudo conectar a la base de datos.";
    exit;
}

// Obtener los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $estado = $_POST['estado'];
    $fecha = $_POST['fecha'];
    $cantidad_total = $_POST['cantidad_total'];
    $id_vendedor = $_POST['id_vendedor'];
    $id_producto = $_POST['id_producto'];

// Resto del código...


    // Validar los datos del formulario (Puedes personalizar esto según tus necesidades)
    if (empty($estado) || empty($fecha) || empty($cantidad_total) || empty($id_vendedor) || empty($id_producto)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Validar el código de vendedor
    $sql = "SELECT count(*) AS cantidad FROM vendedor WHERE id_vendedor = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id_vendedor);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $registro = mysqli_fetch_assoc($resultado);

    if ($registro['cantidad'] == 0) {
        echo "El código de vendedor no existe.";
        exit;
    }

    // Insertar la venta en la tabla 'venta'
    $sqlVenta = "INSERT INTO venta (estado, fecha, Total_cantidad, fk_cod_vendedor)
            VALUES (?, ?, ?, ?)";
    $stmtVenta = mysqli_prepare($conexion, $sqlVenta);
    mysqli_stmt_bind_param($stmtVenta, "ssii", $estado, $fecha, $cantidad_total, $id_vendedor);
    $resultadoVenta = mysqli_stmt_execute($stmtVenta);

    if (!$resultadoVenta) {
        echo "Ocurrió un error al agregar la venta.";
        exit;
    }
    header("location: ventas_list.php");
    // Cerrar las declaraciones preparadas
  }

?> 
