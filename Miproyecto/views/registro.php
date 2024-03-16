<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="pagina\registro.css">
<title>new holland</title>
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
    background-color: slateblue;
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
<body>
<?php
?>
<section class="seccion">
    <form action="http://localhost/Miproyecto/index.php?controller=Usercontrolers&action=adduser" method="post">
        <h1>Registrate</h1>
        <input class="testos" type="text" name="nombre" id="nombre" placeholder="nombre">
        <?php
        if (isset($datosform['nombre'])) {
            echo '<p><small>' . $datosform['nombre'] . '</small></p>';
        }
        ?>
        
        <input class="testos" type="email" name="correo" id="correo" placeholder="correo">
        <?php
        if (isset($datosform['correo'])) {
            echo '<p><small>' . $datosform['correo'] . '</small></p>';
        }
        ?>

        <input class="testos" type="password" name="contrasena" id="contrasena" placeholder="contraseña"> 
        <?php
        if (isset($datosform['contrasena'])) {
            echo '<p><small>' . $datosform['contrasena'] . '</small></p>';
        }
        ?>

        <input class="testos" type="date" name="fecha" id="fecha">
        <?php
        if (isset($datosform['fecha'])) {
            echo '<p><small>' . $datosform['fecha'] . '</small></p>';
        }
        ?>

        <p><a href="iniciosesion.php">¿Ya tienes una cuenta?</a></p>
        <a><input class="boton" type="submit" value="Registrar" name="registrar"></a>
    </form>
</section>
</section>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>