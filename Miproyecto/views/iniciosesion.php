<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>New Holland</title>
    <style>
        *{
    margin: 0;
    padding: 0;

}
body{
    background-repeat: no-repeat;
    background-position: center;
}
.seccion{
    background-color: powderblue;
    text-align: center;
    margin: auto;
    width: 300px;
    border-radius: 4px;
    padding: 30px;
    margin-top: 100px;
    
}
h1{
    background-color: blue;
    margin-bottom: 30px;
}
.testos{
    font-size: 18px;
    margin-bottom: 15px;
    border: 2px solid black;
    width: 100%;
    border-radius: 10px;
    padding: 10px;
}
.boton{
    width: 50%;
    background-color: blue;
    color: chartreuse;
    border: 1px solid cyan;
    
}
.error{
    border: 1px solid red;
    background-color: yellow;
    font-size: 18px;
    margin-bottom: 15px;
    width: 100%;
    border-radius: 10px;
    padding: 10px;
}
    </style>
</head>
<?php

?>
<body>

    <section class="seccion">
    <form action="http://localhost/Miproyecto/index.php?controller=ControllerUsu&action=validacioniniciosesion" method='POST' >
        <h1>Inicio de Sesión</h1>
        <label for="nombre">Nombre de usuario:</label>
        <input class="testos" type="text" id="nombre" name="nombre">
        <?php

          if(isset($data) && isset($data['nombre'])){
            echo "<div class='alert alert-danger'>".$data['nombre']."</div>";
          }

        ?>
        <label for="contrasena" style="margin-top: 6%;">Contraseña:</label>
        <input class="testos" type="password" id="contrasena" name="contrasena">
        <?php

          if(isset($data) && isset($data['contrasena'])){
            echo "<div class='alert alert-danger'>".$data['contrasena']."</div>";
          }

          if(isset($data) && isset($data['general'])){
            echo "<div class='alert alert-danger'>".$data['general']."</div>";
          }

        ?>

        <div style="text-align: center;">
        <input class="boton" type="submit" value="Iniciarsesion" name="Iniciarsesion"><br><br>
        </div>
      </form>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js">
    </script>
</body>
</html>