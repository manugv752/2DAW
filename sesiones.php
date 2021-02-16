<?php

error_reporting(0);

    function inicio_sesion($nombreUsuario,$rol)
    {
        
        // Iniciar la sesión
        session_start();
        // Variables de sesión:

        $_SESSION['sesion_iniciada'] = true;
        $_SESSION['nombre'] = $nombreUsuario;
        $_SESSION['rol'] = $rol;

        echo "Sesion iniciada <br>";
        echo "Nombre: ".$_SESSION['nombre']."<br />";
        echo "Rol: ".$_SESSION['rol']."<br />";
        
    }


// Borrar el contenido de las variables y arrays de sesión:

function cerrar_sesion()
{
    session_destroy();

    if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    }

}

?>