<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <br>
    <div class="container">
        <h1 class="bg-primary p-2 text-white text-center">Lista de Productos</h1>
    </div>
    <br>
    
    <div class="container">
        <table class="table table-responsive">
            <thead>
              <tr>
                <th scope="col">Id_Productox</th>
                <th scope="col">Talla</th>
                <th scope="col">Color</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Nombre</th>
                <th scope="col">Marca</th>
                <th scope="col">Estado</th>
                <th scope="col">Categorias</th>
                <th>

                </th>
              </tr>
            </thead>
            <tbody>

                <?php
                // Verificar si hay un parámetro de éxito en la URL

                  require ("conexion.php");
                  
                  $consulta = "SELECT * FROM producto";
                  $resultado = mysqli_query($conectar, $consulta);

                  while ($fila =  mysqli_fetch_assoc($resultado)) {

                  echo "<tr>";
                  echo "<td>" . $fila["id_producto"] . "</td>";
                  echo "<td>" . $fila["talla"] . "</td>";
                  echo "<td>" . $fila["color"] . "</td>";
                  echo "<td>" . $fila["cantidad"] . "</td>";
                  echo "<td>" . $fila["descripcion"] . "</td>";
                  echo "<td>" . $fila["nombre"] . "</td>";
                  echo "<td>" . $fila["marca"] . "</td>";
                  echo "<td>" . $fila["estado"] . "</td>";
                  echo "<td>" . $fila["categorias"] . "</td>";
                  echo "<td><div class='btn-group'>";
                  echo "<a href='editarformulario.php?id=" . $fila["id_producto"] . "' class='btn btn-warning'>Modificar</a>";
                  
                  echo "<a href='Eliminar.php?id=" . $fila["id_producto"] . "' class='btn btn-danger'>Eliminar</a>";

                  echo "</div></td>";
                  echo "</tr>";
                  }
                 
                ?>
          
            </tbody>
          </table>
          <div class=""container>
            <a href="Agregarformulario.php" class="btn btn-success">Agregar Producto</a>
                </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>