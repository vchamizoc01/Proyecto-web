<?php 
include_once ('models/UsuariosDAO.php');
include_once ('views/view.php');
include_once ('utils/utils.php');
include_once ('views/acopleform.php');

class Usercontrolers {
    function getAllUsuarios() {
        $usuariosDAO = new UsuariosDAO();
        // Recupero los usuarios de la base de datos
        $arrayUsuarios = $usuariosDAO->getAllUsuarios();
        view::show('mostrarusuarios.php', $arrayUsuarios);
    }

    function adduser() {
        $datosform = array();
        if (isset($_POST['registrar'])) {
            
            if (empty($datosform)) {
                // Si no hay errores, procesamos los datos del formulario
                $nombre = filtrado($_POST['nombre']);
                $correo = filtrado($_POST['correo']);
                $contraseña = filtrado($_POST['contrasena']);
                $fecha_nac = filtrado($_POST['fecha']);

                // Creamos una instancia de la clase UsuariosDAO
                $usuariosDAO = new UsuariosDAO();
                // Insertamos los datos en la base de datos
                $usuariosDAO->insertUsuarios($nombre, $correo, $contraseña, $fecha_nac);
                
                header("Location: /Miproyecto/views/cliente.php");
                exit();
            }
        } 
    }
    
}?>