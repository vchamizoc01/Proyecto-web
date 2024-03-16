<html>
        <h1> Listado de Usuarios <h1>

<?php
    echo "<table>";
    echo "<td><tr>Nombre</tr><tr>Email</tr></td>";

    foreach ($data as $usuario){
        echo "<tr><td>".$usuario['nombre']."</td><td>".$usuario['email']."</td></tr>";
        "</table>";
        
    }

?>