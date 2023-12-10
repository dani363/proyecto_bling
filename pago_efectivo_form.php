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
      <input type="text" name="monto" placeholder="Monto" required>
      <label for="id_venta" class="form-label">ID del pago </label>
      <input type="number"  id="id_pago" name="id_pago" value="<?php echo $latestSaleID; ?>">
      <input type="submit" value="Pagar">
    </form>
    
    </div>
    
</body>
</html>