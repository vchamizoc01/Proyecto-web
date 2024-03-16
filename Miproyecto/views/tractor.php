<?php
// Incluye el archivo que contiene la clase Database
include_once ("../database/db.php");

// Crea una instancia de la clase Database
$hola = new Database();

// Intenta obtener la conexión PDO
$conexion = $hola->connect();

// Manejo del envío del formulario (agregar productos al carrito)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["carrito"])) {
    // Verifica si se ha establecido la conexión
    if ($conexion) {
        // Obtiene el ID del producto enviado desde el formulario
        $id_producto = $_POST["id_producto"];

        // Prepara la consulta para insertar el producto en el carrito
        $sql_insert = "INSERT INTO Carrito (ID_Producto, Nombre, Precio, Descripcion, Foto) 
                       SELECT ID_Producto, Nombre_Producto, Precio, Descripcion, Foto FROM Productos WHERE ID_Producto = :id_producto";

        // Prepara y ejecuta la sentencia SQL
        $stmt = $conexion->prepare($sql_insert);
        $stmt->bindParam(':id_producto', $id_producto);
        $stmt->execute();

        // Verifica si la inserción fue exitosa
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Productos de Tractor"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="styles.css">
<title>Tractores - Mi Tienda de Equipos Agrícolas</title>
</head>
<body>
<header class="text-light p-3" style="background-color: blue;">
    <h1 class="text-center">Tractores</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Maquinaria Agrícola</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: left;">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProductos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Productos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownProductos">
              <a class="dropdown-item" href="tractor.php">Tractores</a>
              <a class="dropdown-item" href="cliente.php">Inicio</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="carrito.php"><i class="fas fa-shopping-cart"></i></a>
          </li>
        </ul>
      </div>
    </nav>
</header>

<?php
// Verifica si la conexión se ha establecido correctamente
if ($conexion) {
    // Prepara la consulta SQL
    $sql = "SELECT ID_Producto, Nombre_Producto, Precio, Descripcion, Foto FROM Productos";
    // Ejecuta la consulta y obtiene el resultado
    $resultado = $conexion->query($sql);
    // Verifica si se encontraron productos
    if ($resultado) {
        echo '<div class="container">';
        echo '<div class="row">';
        foreach ($resultado as $row) {
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <img style="max-width:319px;margin-left: 5px;margin-right: 5px;" src="<?php echo $row['Foto']; ?>" class="card-img-top" alt="Imagen del producto">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['Nombre_Producto']; ?></h5>
                        <!-- Agrega este formulario dentro del bucle foreach -->
                        <form method="post">
                            <input type="hidden" name="id_producto" value="<?php echo $row['ID_Producto']; ?>">
                            <button type="submit" class="btn btn-primary" name="carrito">Añadir al carrito</button>
                        </form>
                        <br>
                        <a href="Especificaciones.php?id=<?php echo $row['ID_Producto']; ?>" class="btn btn-primary" style="color: white;">Especificaciones</a>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>'; // Cierra la fila
        echo '</div>'; // Cierra el container
    }
}
?>

<footer class="text-light p-3 mt-5" style="background-color: blue;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="mb-0">CONTACTO</p>
        <p class="mb-0">TELÉFONO: 123-132-135</p>
        <p class="mb-0">DIRECCIÓN: C/GONZALO MURILLO, TRUJILLANOS, ESPAÑA</p>
      </div>
      <div class="col-md-6 text-right">
        <p class="mb-0">DERECHOS DE AUTOR: VICENTE © 2024</p>
      </div>
    </div>
  </div>
</footer>

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>