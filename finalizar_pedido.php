<?php 
include ('conexion.php');
$conexion=conectar();

   // Obtengo las variables
    session_start();
 
   $array_compra=$_SESSION["listacompra"];
  
   if($array_compra==[])
   {
      echo'<script type="text/javascript">
                  alert("Tienes que añadir productos");
                  window.location.href="cesta.php";
                  </script>';
   }else{

   
    
   
   foreach($array_compra as $item)
   {
       foreach($item as $clave => $valor)
       {
            $consulta_stock="SELECT stock FROM productos  WHERE id_producto='$clave';";

            $res=mysqli_query($conexion, $consulta_stock) or die("consulta incorrecta");
            $fila = mysqli_fetch_array($res);

            $stock=$fila['stock']-$valor;
            $stock_error=$fila['stock'];
            

            if($stock<0)
            {
      
               echo'<script type="text/javascript">
                  alert("Stock Insuficiente, stock actual:   '.$stock_error.'");
                  window.location.href="cesta.php";
                  </script>';



            }else{
               
            $consulta = "UPDATE productos SET  stock='$stock' WHERE id_producto='$clave';";

            $res=mysqli_query($conexion, $consulta) or die("consulta incorrecta");

            
            $_SESSION["listacompra"]=[];

            echo "<h1> Su pedido ha sido realizado</h1>";


            }
    

       }
    }
 }
