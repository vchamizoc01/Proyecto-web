<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Especificaciones del Producto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<title>Especificaciones del Producto</title>
<style>
    body {
        padding-top: 50px;
        background-color: #FFFFFF; /* Blanco */
    }
    .container {
        max-width: 600px;
    }
    .card {
        margin-bottom: 20px;
        background-color: #FFFFFF; /* Blanco */
        border: 1px solid #ced4da; /* Color de borde */
        border-radius: 0.25rem; /* Bordes redondeados */
    }
    .card-header {
        background-color: #007bff; /* Azul */
        color: #FFFFFF; /* Blanco */
    }
    .card-body {
        color: #000000; /* Negro */
    }
</style>
</head>
<body>
<div class="container">
    <?php
    // Incluir el archivo que contiene la clase Database
    include_once ("../database/db.php");

    // Crear una instancia de la clase Database
    $hola = new Database();

    // Intentar obtener la conexión PDO
    $conexion = $hola->connect();

    // Definir un array vacío para almacenar los detalles del producto
    $producto = array();

    // Verificar si se recibe un ID de producto válido
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id_producto = $_GET['id'];

        // Verificar si la conexión se ha establecido correctamente
        if ($conexion) {
            // Preparar la consulta SQL para obtener los detalles del producto seleccionado
            $sql = "SELECT Nombre_Producto, Precio, Descripcion, Foto FROM Productos WHERE ID_Producto = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':id', $id_producto);
            $stmt->execute();
            
            // Obtener los detalles del producto
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    ?>

    <?php if (!empty($producto)): ?>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><?php echo $producto['Nombre_Producto']; ?></h5>
        </div>
        <div class="card-body">
            <img style="max-width:319px;margin-left: 5px;margin-right: 5px;" src="<?php echo $producto['Foto']; ?>" class="card-img-top">
            <p><strong>Precio:</strong> <?php echo $producto['Precio']; ?></p>
            <p><strong>Descripción:</strong> <?php echo $producto['Descripcion']; ?></p>
        </div>
    </div>
    <?php else: ?>
    <div class="alert alert-danger" role="alert">
        No se encontraron detalles del producto.
    </div>
    <?php endif; ?>
</div>
</body>
</html>