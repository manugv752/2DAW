<?php


     session_start();
    error_reporting(0);
    $id = $_REQUEST['id'];
    $cantidad = $_REQUEST['cantidad'];
    $_SESSION['listacompra'];

    if($id!="" && $cantidad!="")
    {
        if(is_array($_SESSION['listacompra']))
        {
            array_push($_SESSION['listacompra'], [ $id=> $cantidad]);
            

        }else{
            $_SESSION['listacompra']=[];
            array_push($_SESSION['listacompra'],[ $id => $cantidad]);
           
        }
    }




header("Location: productos.php");



?>