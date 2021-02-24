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
        $_SESSION['listacompra']=[];

        echo "Sesion iniciada <br>";
        echo "Nombre: ".$_SESSION['nombre']."<br />";
        echo "Rol: ".$_SESSION['rol']."<br />";
        
    }




?>