<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="col_pago_list.php" method="post">
          <input type="text" name="cedula" placeholder="Cédula" required>
          <input type="text" name="numero_Tarjeta" placeholder="Número de tarjeta" required>
          <input type="text" name="codigo_seguridad" placeholder="Código de seguridad" required>
          <input type="date" name="fecha_vencimiento" placeholder="Fecha de vencimiento" required>
          <label for="id_venta" class="form-label">ID del pago</label>
          <input type="number"  id="id_venta" name="id_venta" value="<?php echo $latestSaleID; ?>">
          <input type="submit" value="Pagar">
        </form>
</body>
</html>