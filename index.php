<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    $consultaUsuario = "SELECT id_usuario, contraseña, tipo_usuario FROM usuario WHERE correo = '$correo'";
    $resultadoConsulta = mysqli_query($conectar, $consultaUsuario);

    if ($resultadoConsulta) {
        $usuario = mysqli_fetch_assoc($resultadoConsulta);

        if ($usuario && password_verify($contraseña, $usuario["contraseña"])) {
            // Iniciar sesión
            session_start();
            $_SESSION["id_usuario"] = $usuario["id_usuario"];
            $_SESSION["tipo_usuario"] = $usuario["tipo_usuario"];

            // Redirigir al menú correspondiente
            if ($usuario["tipo_usuario"] == 1) {
                header("Location: menuV.html"); // Redirigir a la interfaz del vendedor
            } elseif ($usuario["tipo_usuario"] == 2) {
                header("Location: menuC.html"); // Redirigir a la interfaz del cliente
            } else {
                // Manejar otros tipos de usuarios si es necesario
                echo "Tipo de usuario no reconocido";
            }

            exit();
        } else {
            echo "Correo o contraseña incorrectos";
        }
    } else {
        echo "Error al realizar la consulta: " . mysqli_error($conectar);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="fondo-azul">
    <div class="container">
        <div class="row text-center">
            <div class="col-4 column"></div>
            <div class="col-4 column border text-center">
                <h1 class=""></h1>
                <form action="" method="post">
                    <h1 class="p-3 mb-2 bg-primary text-white">Inicio de Sesión</h1>
                    <div class="col-md-12">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="col-lg-12 p-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input cuadrito" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label text-center" for="invalidCheck">
                                Acepto todas las condiciones
                            </label>
                        </div>
                    </div>
                    <div class="col-12 p-3">
                        <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
                    </div>
                </form>
                <div class="p-3"><a href="Registro.html">Registrarse</a></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
