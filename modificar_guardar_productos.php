<HTML>
  <HEAD>
   <TITLE></TITLE>
  </HEAD>
  <BODY>

<?php
include ('conexion.php');
$conexion=conectar();

   // Obtengo las variables
   $id_producto =$_REQUEST["id_producto"];
   $nombre = $_REQUEST["nombre"];
   $precio = $_REQUEST["precio"];
   $stock = $_REQUEST["stock"];
   $descripcion = $_REQUEST["descripcion"];
   $id_categoria_productos = $_REQUEST["id_categoria_productos"];

    $consulta = "UPDATE productos SET  nombre='$nombre', precio='$precio', stock='$stock', descripcion='$descripcion', id_categoria_productos='$id_categoria_productos' WHERE id_producto='$id_producto';";

    $res=mysqli_query($conexion, $consulta) or die("consulta incorrecta");

    header("Location:administrar_productos.php");
		
?>