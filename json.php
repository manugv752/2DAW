

<?php 

//session_start();
include "conexion.php";

function obtener_productos(){
   $conexion=conectar();
   $consulta = "SELECT id_producto,nombre,imagen,precio,stock FROM productos;";

   $res=mysqli_query($conexion,$consulta) or die("consulta incorrecta");

   for($i = 0 ; $i <  mysqli_num_rows ($res) ; $i++)
   {
      

        $fila =  mysqli_fetch_assoc($res );
        $fila['imagen']=$base64 = 'data:image/' . ';base64,' . base64_encode($fila['imagen']);

     
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
}

 function json($array){
   header('Content-Type: application/json');
   $json = json_encode($array);
   echo $json;
   $file = 'productos.json';
   file_put_contents($file,$json );
 }

obtener_productos();





?>

