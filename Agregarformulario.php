<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
 
  <body>
    <h1 class="bg-primary p-2 text-white text-center">Agrega un Producto</h1>


    
<br>
<div class="container">
    <form action="Añadir.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Talla</label>
    <input type="text" class="form-control" name="talla">
  </div>
  <div class="mb-3">
    <label class="form-label">Color</label>
    <input type="text" class="form-control" name="color">
  </div>
  <div class="mb-3">
    <label class="form-label">Cantidad</label>
    <input type="number" class="form-control" name="cantidad">
  </div>
  <div class="mb-3">
    <label class="form-label">Descripcion</label>
    <input type="text" class="form-control" name="descripcion">
  </div>
  <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre">
  </div>
  <div class="mb-3">
    <label class="form-label">Estado</label>
    <input type="text" class="form-control" name="estado">
  </div>
  <div class="mb-3">
    <label class="form-label">Categorias</label>
    <input type="text" class="form-control" name="categorias">
  </div>
  <div class="mb-3">
    <label for="marcaSelect" class="form-label">Selecciona una marca:</label>
    <select class="form-select" id="marcaSelect" name="nombre_marca" aria-label="Selecciona una marca">
    <option selected>Selecciona una marca</option>


    <?php
    // Consultar las marcas desde la base de datos
    include ("conexion.php");
    $sql = "SELECT id_marca, nombre_marca FROM marca";
    $result = $conectar->query($sql);
    
    
    // Generar opciones del select
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id_marca'] . "'>" . $row['nombre_marca'] . "</option>";
        }
    } else {
        echo "<option value=''>No hay marcas disponibles</option>";
    }

    ?>
</select>

</div>
</div>
  <div class= "text-center">
  <button type="submit" class="btn btn-danger">Guardar</button>
  <a href="visualizar.php" class="btn btn-dark">Regresar a la Lista</a>
</div>
</form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

