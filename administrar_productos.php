
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos</title>
    <style>

table {     
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  font-size: 12px;    
  width: 50%; 
  text-align: center;    
  border-collapse: collapse;
  
}

th {    
  font-size: 13px;    
  font-weight: normal;     
  padding: 8px;    
  background: #b9c9fe;
  border-top: 4px solid #aabcfe;   
 border-bottom: 1px solid #fff;
  color: #039; 
}

td {   
   padding: 8px;    
    background: #e8edff;     
    border-bottom: 1px solid #fff;
    color: #669;   
     border-top: 1px solid transparent;
 }

tr:hover td { 
  background: #d0dafd;
   color: #339;
 }
 </style>
</head>
<body>
<?php 

include 'conexion.php';
  
$conexion=conectar();



$consulta = "SELECT * FROM productos;";


$res=mysqli_query($conexion,$consulta) or die("consulta incorrecta");
    
$n_filas = mysqli_num_rows ($res);

echo "<center><h1> Listado de productos </h1></center>";
echo "<center><a href=modificar.php><button type='button'>Añadir Producto</a></center> <br>";


echo "<table align=center>\n";
echo "<tr >\n
    <th>ID</th>\n
    <th>Nombre</th>\n
    <th>Imagen</th>\n
    <th>precio</th>\n
    <th>Stock</th>\n
    <th>Modificar</th>\n
   
    
</tr>\n";

for($i=1; $i<=$n_filas; $i++)
{
    $fila = mysqli_fetch_array($res);
    $imagen ='data:image/' . ';base64,' . base64_encode($fila['imagen']);
    echo "<tr>\n";
    echo "  <td>".$fila['id_producto']."</td>\n";
     echo "  <td>".$fila['nombre']."</td>\n";
     echo "  <td> <img width='70' height='70' src='$imagen'></img></td>\n";
    echo "  <td>".$fila['precio']."</td>\n";
    echo "  <td>".$fila['stock']."</td>\n";
   echo "  <td><a href=modificar.php?id=".$fila['id_producto'].">Modificar</a>";
  //  echo "  <td><a href=eliminar.php?id=".$fila['dni']."><img src=ico_eliminar.png border=0></a>";
echo "</tr>\n";
}
echo "<tr><td colspan=10> <hr>";

echo "</td></tr></table>";



?>
</body>
</html>