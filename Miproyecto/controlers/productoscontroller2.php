<?php
if(!isset($_SESSION['carrito'])){
  $_SESSION['carrito']=array();
}
/** 
 *  Controlador de Productos. Implementará todas las acciones que se puedan llevar a cabo desde las vistas
 * que afecten a productos de la tienda.
 */
include ("../views/view.php");

class ProductController {
    public function addCarrito(){
        if (isset($_GET['ID_Producto'])){
            array_push($_SESSION['carrito'],$_GET['ID_Producto']);  
            include_once '../models/ProductosDAO.php';    
            $pDAO=new ProductoDAO();
            $products=$pDAO->getAllProducts();
            $pDAO=null;
            View::show("showProducts", $products);
        }
    }

    public function verCarrito(){
        include_once '../models/ProductosDAO.php';
        $pDAO=new ProductosDAO();
        $arrayCarrito= array();
        foreach($_SESSION['carrito'] as $posicion => $id){
            $producto=$pDAO-> getProductById($id);
            array_push($arrayCarrito,$producto);
        }
        View::show("carrito", $arrayCarrito);
    }

    public function borrarproducto(){
        include_once 'models/productos.php';
        if (isset($_GET['id_product'])){
            $pDAO=new ProductoDAO();
            $products=$pDAO->borrarprod($_GET['id_product']);
            $products=$pDAO->getAllProducts();
            $pDAO=null;
            View::show("showProducts", $products);
        }
    }
    public function getProductById($id){
        $sql = "SELECT * FROM Productos WHERE ID_Producto = :id";
        $stmt = $this->db_con->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $producto;
    }
}

?>