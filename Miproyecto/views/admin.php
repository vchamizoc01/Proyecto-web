<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="admin.css">
<title>Panel de Administrador</title>
</head>
<body>
<header class="text-light p-3" style="background-color: blue;">
    <h1 class="text-center">Panel de Administrador</h1>
</header>

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">Mi Tienda de Equipos Agrícolas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProductos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Productos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownProductos">
        <a class="dropdown-item" href="oferta.php">Ofertas</a>
          <a class="dropdown-item" href="tractor.php">Productos</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 text-light" style="background-color: black;">
      <ul class="list-unstyled">
        
        <li><a href="mostrarusuarios.php">Usuarios</a></li>
        <li><a href="mostrarproductos.php">Productos</a></li>
        <li><a href="productos.php">ProductosAE</a></li>
        <li><a href="#">Pedidos</a></li>
        <li><a href="#">Configuración</a></li>
      </ul>
    </div>
    <div class="col-md-9">
      <h2>Contenido del Panel de Administrador</h2>
    </div>
  </div>
</div>

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