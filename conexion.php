<?php

function conectar(){
    $user="root";
    $pass="";
    $server="127.0.0.1";
    $db="tienda";
    $con=mysqli_connect($server,$user,$pass);
    if (!$con) {
        die("Erro al conectar: " . mysqli_connect_error());
      }
    
      
    mysqli_select_db($con,$db);

    return $con;

}
?>