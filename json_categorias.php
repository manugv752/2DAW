<?php 

session_start();
include "conexion.php";

function json($array){
    header('Content-Type: application/json');
    $json = json_encode($array);
    //echo $json;
   // $file = 'productos.json';
    //file_put_contents($file,$json );
  }


   $conexion=conectar();

   $categoria=$_REQUEST["id"];
   echo $categoria;
   $consulta = "SELECT id_producto,nombre,imagen,precio,stock,id_categoria_productos FROM productos where id_categoria_productos='1';";

   $res=mysqli_query($conexion,$consulta) or die("consulta incorrecta");

   for($i = 0 ; $i <  mysqli_num_rows ($res) ; $i++)
   {
      

        $fila =  mysqli_fetch_assoc($res );
        $fila['imagen']/*=$base64*/ = 'data:image/' . ';base64,' . base64_encode($fila['imagen']);

     
        //print_r($fila);
        $array[$i]=$fila;
     
        /*
        foreach($fila as $value)
        {
         $base64 = 'data:image/' . ';base64,' . base64_encode($value);
            //  $fila2[$i]= base64_encode($value);
            // echo '<img src="'.$base64.'"/>'; ;
        }
        

       $array[$i] = $base64;*/
       
   }
   json($array);
  // return $array;
   //print_r($array);

   header("Location: productos.php");




?>