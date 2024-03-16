<?php
include_once ('heidi2/db.php');
/**
 * Clase de acceso a datos para la tabla productos. IMplementa todos los métodos que necesiten atacar
 * la tabla productos de la base de datos.
 */
class PedidosDAO {

    //Atributo con la conexión a la BBDD.
    private $db_con;

    //Constructor que inicializa la conexión a la BBDD.
    public function __construct (){
        $this->db_con=Database::connect();
    }

    //Método que devuelve un array con todos los productos existentes en la base de datos.
    public function getAllProducts(){
        $stmt= $this->db_con->prepare("Select * from PedidosDAO");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        $productos= array ();

        return $stmt->fetchAll();
    }

    //Método que devuelve toda la información de un producto dado su id.
    public function getProductById ($id){
        $stmt= $this->db_con->prepare("Select * from ProductosDAO where ID_Pedidos=$id");
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $stmt->fetch();        
    }



    //Instar un productos en la base de datos.

    public function insertProduct($ID_Pedidos, $ID_Usuario, $Fecha_Pedido){
        $stmt= $this->db_con->prepare ("Insert into ProductosDAO (ID_Pedidos, ID_Usuario, Fecha_Pedido) values (:id_pedidos, :id_usuario, :fecha)");      
        
        $stmt->bindParam(':id_pedidos', $ID_Pedidos);
        $stmt->bindParam(':id_usuario', $ID_Usuario);
        $stmt->bindParam(':fecha', $Fecha_Pedido);

        try{
            return $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        
    }

    public function borrarprod($id){
        $stmt= $this->db_con->prepare ("Delete from ProductosDAO where ID_Pedidos=$id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();       
    }

}
?>