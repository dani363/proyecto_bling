<?php
require "conexion.php";

//recuperar las variables
$unidades = $_POST["cantidad"];
$idUsuario = $_GET['idUsuario'];
$idProducto = $_GET['idProducto'];
$fecha = date("Y-m-d");
$situacion = "En proceso";

//Creamos la sentencia SQL para guardar pedido
$insertPedido = "INSERT INTO pedido (fecha,situacion,fk_id_usuario) VALUES('$fecha', '$situacion','$idUsuario')";
$queryPedido = mysqli_query($conectar, $insertPedido);

    if($queryPedido) {
        $idGeneradoPedido = mysqli_insert_id($conectar);
        echo "Pedido generado exitosamente ID: $idGeneradoPedido <br><br>";

        // Creamos la sentencia SQL para guardar el detalle del pedido
        $insertDetalle = "INSERT INTO detalles_pedido (unidades,fk_id_producto,fk_id_pedido) VALUES('$unidades','$idProducto','$idGeneradoPedido')";
        $queryDetalle = mysqli_query($conectar, $insertDetalle);

        if($queryDetalle) {
            $idGeneradoDetallePedido = mysqli_insert_id($conectar);
            echo "Detalle de pedido generado exitosamente ID: $idGeneradoDetallePedido";
        } else {
            echo "Error al conectarse a la BD";
        }
    } else {
        echo "Error al conectarse a la BD";
    }
?>