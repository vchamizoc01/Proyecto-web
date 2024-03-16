<?php
include_once ('models/ProductosDAO.php');
include_once ('views/view.php');
include_once ('utils/utils.php');
include_once ('views/acopleform.php');

class Productoscontroller {

    public function getAllProductos(){
            $productosDAO = new ProductosDAO();
            // Recupero los usuarios de la base de datos
            $arrayUsuarios = $productosDAO->getAllProductos();
            view::show('prueba.php', $arrayUsuarios);
        
    }
    function insertProduct() {
        $datospro = array();
        if (isset($_POST['registrarpro'])) {
            if (empty($datospro)) {
                // Si no hay errores, procesamos los datos del formulario
                $nombre = filtrado($_POST['Nombre_Producto']);
                $precio = filtrado($_POST['Precio']);
                $descripcion = filtrado($_POST['Descripcion']);
                $foto = filtrado($_POST['Foto']);

                // Creamos una instancia de la clase ProductosDAO
                $productosDAO = new ProductosDAO();
                // Insertamos los datos en la base de datos
                $productosDAO->insertProduct($nombre, $precio, $descripcion, $foto);
                
                header("Location: /Miproyecto/views/admin.php");
                exit();
            }
        } 
    }
}
?>