<?php

$conexion = mysqli_connect('localhost', 'root', '', 'bling_o');

if (!$conexion) {
    echo "Error: No se pudo conectar a la base de datos.";
    exit;
}

// Obtener los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $estado = $_POST['estado'];
  $fecha = $_POST['fecha'];
  $cantidad_total = $_POST['cantidad_total'];
  $total_venta = $_POST['total_venta'];
  $id_vendedor = $_POST['id_vendedor'];
  $id_producto = $_POST['id_producto'];

  // Validar los datos del formulario
  if (empty($estado)) {
    echo "Debe ingresar el estado de la venta.";
    exit;
  }

  if (empty($fecha)) {
    echo "Debe ingresar la fecha de la venta.";
    exit;
  }

  if (empty($cantidad_total)) {
    echo "Debe ingresar la cantidad total de la venta.";
    exit;
  }

  if (empty($total_venta)) {
    echo "Debe ingresar el total de la venta.";
    exit;
  }
  if (!empty($_POST)) {
    $id_producto = $_POST['id_producto'];
    } else {
    echo "Debe seleccionar un producto.";
    exit;
    }
      

  // Validar el cod_vendedor
  $sql = "SELECT count(*) AS cantidad FROM vendedor WHERE id_vendedor = '{$id_vendedor}'";
  $resultado = mysqli_query($conexion, $sql);
  $registro = mysqli_fetch_assoc($resultado);

  if ($registro['cantidad'] == 0) {
    echo "El código de vendedor no existe.";
    exit;
  }

  // Insertar la venta en la base de datos
 

  $sql = "INSERT INTO venta (estado, fecha, Total_cantidad, Total_venta, fk_cod_vendedor)
  VALUES ('{$estado}', '{$fecha}', {$cantidad_total}, {$total_venta}, {$id_vendedor})";
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
    echo "La venta se agregó correctamente.";
    header('Location: pago.php');
    
  } else {
    echo "Ocurrió un error al agregar la venta.";
  }
}

