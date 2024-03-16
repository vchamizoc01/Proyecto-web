<?php
include_once ('heidi2/db.php');

/**
 * Clase de acceso a datos para la tabla productos. IMplementa todos los métodos que necesiten atacar
 * la tabla productos de la base de datos.
 */
class Productos_PedidosDAO {

    //Atributo con la conexión a la BBDD.
    private $db_con;

    //Constructor que inicializa la conexión a la BBDD.
    public function __construct (){
        $this->db_con=Database::connect();
    }

    //Método que devuelve un array con todos los productos existentes en la base de datos.
    public function getAllpp(){
        $stmt= $this->db_con->prepare("Select * from Productos_PedidosDAO");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        $productos= array ();

        return $stmt->fetchAll();
    }

    //Método que devuelve toda la información de un producto dado su id.
    public function getppById ($id){
        $stmt= $this->db_con->prepare("Select * from Productos_PedidosDAO where ID_pp=$id");
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $stmt->fetch();        
    }



    //Instar un productos en la base de datos.

    public function insertProduct($ID_pp, $ID_Pedidos, $ID_Producto, $Cantidad){
        $stmt= $this->db_con->prepare ("Insert into Productos_PedidosDAO (ID_pp, ID_Pedidos, ID_Producto, Cantidad) values (:pp, :pedido, :producto, :cantidad)");      
        
        $stmt->bindParam(':pp', $ID_pp);
        $stmt->bindParam(':pedido', $ID_Pedidos);
        $stmt->bindParam(':producto', $ID_Producto);
        $stmt->bindParam(':cantidad', $Cantidad);

        try{
            return $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        
    }

    public function borrarprod($id){
        $stmt= $this->db_con->prepare ("Delete from Productos_PedidosDAO where ID_pp=$id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();       
    }

}
?>