<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="guardar_tarjeta.php" method="post">
          <input type="text" name="cedula" placeholder="Cédula" required>
          <input type="text" name="numero_Tarjeta" placeholder="Número de tarjeta" required>
          <input type="text" name="codigo_seguridad" placeholder="Código de seguridad" required>
          <input type="date" name="fecha_vencimiento" placeholder="Fecha de vencimiento" required>
          <input type="submit" value="Pagar">
        </form>
</body>
</html>
