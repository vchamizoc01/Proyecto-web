<?php include_once("header.php")?>
<?php
$host = 'mariadb';          // Dirección del host de la base de datos
$dbname = 'database';     // Nombre de la base de datos
$username = 'admin';        // Nombre de usuario de la base de datos
$password = 'changepassword'; 
try {
    $dsn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Consulta SQL para seleccionar todos los usuarios
    $sql = "SELECT ID_Usuario, Nombre, Correo, Contrasena, Fecha_nac FROM Usuarios";
    $stmt = $dsn->prepare($sql);
    $stmt->execute();

    // Verificar si se han encontrado resultados
    if ($stmt->rowCount() > 0) {
        // Mostrar los usuarios en una tabla HTML
        echo "<h2>Lista de Usuarios</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Contraseña</th><th>Fecha Nacimiento</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['ID_Usuario']."</td>";
            echo "<td>".$row['Nombre']."</td>";
            echo "<td>".$row['Correo']."</td>";
            echo "<td>".$row['Contrasena']."</td>";
            echo "<td>".$row['Fecha_nac']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron usuarios.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Cerrar la conexión
    $dsn = null;
}
?>
<?php include_once("footer.php")?>