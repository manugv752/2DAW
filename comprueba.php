<?php
include 'conexion.php';
include 'sesiones.php';
//Parametros
 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "root";
 $verificacion= $_POST['password'];
 
 //Conexion
 $conexion =conectar();

 if (mysqli_connect_errno()) {
 die("La conexion falló: " . mysqli_connect_errno());
}
//Consulta
 $buscarUsuario = "SELECT contraseña FROM usuarios
 WHERE  nombre = '$_POST[nombre]' ";

 $resultado = mysqli_query($conexion,$buscarUsuario);

 $finfo = mysqli_fetch_array($resultado);
 $ave=$finfo[0];
 

 
//comparacion contraseñas
if (password_verify($verificacion,$ave))
{
    

    $nombreUsuario = $_POST['nombre'];
    
    $roles = mysqli_fetch_array(mysqli_query($conexion, "SELECT rol FROM usuarios
    WHERE  nombre = '$_POST[nombre]' "));
    $rol = $roles[0];

    /*$rol = mysqli_query($conexion, "SELECT rol FROM usuarios
    WHERE  nombre = '$_POST[nombre]' ");*/
    


    inicio_sesion($nombreUsuario,$rol);
   
    
    header("Location: index.php");

} else {
    echo 'Usuario o Contraseña incorrecta.';
    echo "<h5>" . "Hacer Login: " . "<a href='login.html'>Login</a>" . "</h5>"; 

}


 
 
 mysqli_close($conexion);

?>