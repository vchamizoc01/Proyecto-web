<?php
session_start();

// Verifica si se ha establecido la conexión
include_once ("../database/db.php");
$hola = new Database();
$conexion = $hola->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar_producto"])) {
    if ($conexion) {
        $id_producto = $_POST["id_producto"];

        $sql_delete = "DELETE FROM Carrito WHERE ID_Producto = :id_producto";
        $stmt = $conexion->prepare($sql_delete);
        $stmt->bindParam(':id_producto', $id_producto);
        $stmt->execute();

        // Redireccionar para evitar el reenvío del formulario
        header("Location: carrito.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFFFF; /* Blanco */
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #007bff; /* Azul */
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #007bff; /* Azul */
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        form {
            display: inline-block;
        }
        button {
            background-color: #007bff; /* Azul */
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3; /* Azul más oscuro */
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($conexion) {
                $sql = "SELECT ID_Producto,Nombre, Precio, Foto FROM Carrito";
                $resultado = $conexion->query($sql);
                if ($resultado) {
                    foreach ($resultado as $row) {
                        echo "<tr>";
                        echo "<td><img src='".$row['Foto']."' alt='Foto del producto'></td>";
                        echo "<td>".$row['Nombre']."</td>";
                        echo "<td>".$row['Precio']."</td>";                        
                        echo "<td>
                                <form method='post'>
                                    <input type='hidden' name='id_producto' value='".$row['ID_Producto']."'>
                                    <button type='submit' name='eliminar_producto'>Eliminar</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>