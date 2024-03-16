<?php
include_once ('models/UsuariosDAO.php');
include_once ('views/view.php');
include_once ('utils/utils.php');
include_once ('views/acopleform.php');
class ControllerUsu{
   
public function showiniciosesion(){
    View::show("iniciosesion");
}

public function validacioniniciosesion() {
    $errores = array();

    if (isset($_POST['Iniciarsesion'])) {
        if (!isset($_POST['nombre']) || strlen($_POST['nombre']) == 0) {
            $errores['nombre'] = "El nombre debe estar relleno";
        }
        if (!isset($_POST['contrasena']) || strlen($_POST['contrasena'])<8) {
            $errores['contrasena'] = "La contraseña no puede estar vacía y no puede tener menos de 8 caracteres";
        }
        if (empty($errores)) {
            include_once('models/UsuariosDAO.php');
            $usuarioDAO = new UsuarioDAO();
            $usuario = $usuarioDAO->getUsuariosbynombre($_POST['nombre']);

            if ($usuario) {
                // Verificar si la contraseña es correcta
                if ($_POST['contrasena'] === $usuario['Contrasena']){
                    // Verificar si el usuario es administrador
                    if (strtolower($_POST['nombre']) === 'admin' && $_POST['contrasena'] === 'admin1234') {
                        header("Location: views/admin.php");
                        exit();
                    } else {
                        header("Location: views/cliente.php");
                        exit();
                    }
                } else {
                    $errores['general'] = "Contraseña incorrecta.";
                    View::show("views/iniciosesion", $errores);
                }
            } else {
                $errores['general'] = "El usuario no está registrado.";
                View::show("views/iniciosesion", $errores);
            }
        } else {
            View::show("views/iniciosesion", $errores);
        }
    }
}

public function cerrarsesion(){
    session_destroy();
    View::show("views/iniciosesion",$errores);
}

}



?>