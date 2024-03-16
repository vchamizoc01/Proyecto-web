<?php
include_once ('database/db.php');
/**
 * Clase de acceso a datos para la tabla productos. IMplementa todos los métodos que necesiten atacar
 * la tabla productos de la base de datos.
 */
class UsuariosDAO {

    //Atributo con la conexión a la BBDD.
    private $db_con;

    //Constructor que inicializa la conexión a la BBDD.
    public function __construct() {
        $this->db_con = Database::connect();
    }

    //Método que devuelve un array con todos los productos existentes en la base de datos.
    public function getAllUsuarios(){
        $stmt= $this->db_con->prepare("Select * from Usuarios");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $productos= array ();

        return $stmt->fetchAll();
    }

    //Método que devuelve toda la información de un producto dado su id.
    public function getUsuariosbyID ($id){
        $stmt= $this->db_con->prepare("Select * from Usuarios where ID_Usuario=$id");
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $stmt->fetch();        
    }



    //Instar un productos en la base de datos.

    public function insertUsuarios($nombre, $correo, $contrasena, $fecha_nac){
    try {
        $stmt = $this->db_con->prepare("INSERT INTO Usuarios (Nombre, Correo, Contrasena, Fecha_nac) VALUES (:nombre, :correo, :contrasena, :fecha_nac)");

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':fecha_nac', $fecha_nac);

        return $stmt->execute();
    } catch (PDOException $e) {
        // Manejo de errores
        echo "Error al insertar usuario: " . $e->getMessage();
        return false;
    }
}

    public function borrarUsuario($id){
        $stmt= $this->db_con->prepare ("Delete from Usuarios where ID_Usuario=$id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();       
    }

}
class UsuarioDAO{
    public $db_con;
    public function __construct(){
        $this->db_con=Database::connect();
    }
    public function getAllUsers($nombre,$contrasena){
        $stmt=$this->db_con->prepare("select * from Usuarios where Nombre='$nombre' and Contrasena='$contrasena'");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getUsuariosbynombre ($nombre){
        $stmt= $this->db_con->prepare("Select * from Usuarios where Nombre=:nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();        
    }
}
?>