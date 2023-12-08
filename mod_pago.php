
<?php 
session_start();

// Conexión a la base de datos

$conexion = mysqli_connect('localhost:3307', 'root', '', 'bling_o');

if (!$conexion) {
     echo "Error: No se pudo conectar a la base de datos.";
     exit;
}


// Obtener los datos del formulario
if (isset($_POST['fecha_pago']) && isset($_POST['total']) && isset($_POST['id_pago'])) {
    $fecha_pago = $_POST['fecha_pago'];
    $total = $_POST['total'];
    $id_pago = $_POST['id_pago'];

    // Consulta SQL
    $sql = "UPDATE pago SET fecha_pago = '$fecha_pago', total = $total WHERE id_pago = $id_pago";
    $resultado = mysqli_query($conexion, $sql);

    // Comprobar si la consulta se ha ejecutado correctamente
    if ($resultado) {
        // Validaciones
        if ($total < 0) {
            echo "El total debe ser un valor positivo.";
        }
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha_pago)) {
            echo "La fecha de pago no es válida.";
        }
        if ($id_pago < 0) {
            echo "El ID del pago debe ser un valor positivo.";
        }
    } else {
        echo "Error: No se pudo modificar el registro.";
        header('Location: col_pago_list.php');
    }
    header('Location: col_pago_list.php');
}

if (isset($_POST['fecha_pago'])) {
}
