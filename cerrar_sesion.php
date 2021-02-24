
<?php
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

cerrar_sesion();
header("Location: index.php");
?>