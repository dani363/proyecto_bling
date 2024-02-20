<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-dark bg-primary navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Bling Compra</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">    
        <h5 class="text-white">Bienvenido a tu inventario</h5>  
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar Producto por ID" aria-label="Search" name = "query">
        <button class="btn btn-outline-dark" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
    <br>
    
    
    <div class="container">
    <table class="table table-responsive table-primary table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">Id Producto</th>
                <th scope="col">Id Marca</th>
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

                  require ("conexion.php");
                  
                  $consulta = "SELECT * from marca_producto join producto on marca_producto.fk_id_producto = producto.id_producto join marca on marca_producto.fk_id_marca = marca.id_marca ORDER BY id_marcaprod ASC";
                  $resultado = mysqli_query($conectar, $consulta);

                  while ($fila =  mysqli_fetch_assoc($resultado)) {

                  echo "<tr>";
                  echo "<td>" . $fila["id_producto"] . "</td>";
                  echo "<td>" . $fila["id_marca"] . "</td>";
                  echo "<td>" . $fila["talla"] . "</td>";
                  echo "<td>" . $fila["color"] . "</td>";
                  echo "<td>" . $fila["cantidad"] . "</td>";
                  echo "<td>" . $fila["descripcion"] . "</td>";
                  echo "<td>" . $fila["nombre"] . "</td>";
                  echo "<td>" . $fila["nombre_marca"] . "</td>";
                  echo "<td>" . $fila["estado"] . "</td>";
                  echo "<td>" . $fila["categorias"] . "</td>";
                  echo "<td><div class='btn-group'>";
                  echo "<a href='editarformulario.php?id=" . $fila["id_producto"] . "' class='btn btn-warning'>Modificar</a>";
                  
                  // echo "<a href='Eliminar.php?id=" . $fila["id_producto"] . "' class='btn btn-danger'>Eliminar</a>";

                  echo "</div></td>";
                  echo "</tr>";
                  }
                 
                ?>
          
            </tbody>
          </table>
          <div class=""container>
            <a href="Agregarformulario.php" class="btn btn-success">Agregar Producto</a>
            <a href="MenuV.html" class="btn btn-dark">Regresar</a>
                </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
