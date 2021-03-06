<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta</title>
    <link rel="stylesheet" href="css/tabla.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
<?php

session_start();

?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand bg-info p-2" href="#">Bienvenido  <?php error_reporting(0); echo $_SESSION['nombre']?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="productos.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
       
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categorias
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="json_categorias.php?id=1">Artesanales</a>
                  <a class="dropdown-item" href="json_categorias.php?id=2">IPA</a>
                  <a class="dropdown-item" href="json_categorias.php?id=3">Lager</a>
                  <a class="dropdown-item" href="json_categorias.php?id=4">Negras</a>
                  <a class="dropdown-item" href="json_categorias.php?id=5">Trigo</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cesta.php">Mi cesta</a>
              </li>
              <?php if($_SESSION['rol']=="admin")
              {
                
                echo " <li class='nav-item'>
                <a class='nav-link' href=administrar_usuarios.php>
                Administrar Usuarios</a></li>";

                echo " <li class='nav-item'>
                <a class='nav-link' href=administrar_productos.php>
                Administrar Productos</a></li>";


              
              }
              ?>
              <li class="nav-item ">
                <a class="nav-link" href="cerrar_sesion.php">Cerrar sesion </a>
              </li>
  
   
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Categoria">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    <?php
  

    if($_SESSION['sesion_iniciada'] == true)

    {

   
    include 'conexion.php';

    $array_compra=$_SESSION["listacompra"];
    $arrayObjetos[]=[];
    $suma_total=0;

/********************************************************************************* */
    
    $conexion=conectar();



    $consulta = "SELECT * FROM productos;";


    $res=mysqli_query($conexion,$consulta) or die("consulta incorrecta");
        
    $n_filas = mysqli_num_rows ($res);

        echo "<center><h1> Carrito de compra </h1></center>";
        echo "<table align=center>\n";
        echo "<tr >\n
            <th>Nombre</th>\n
            <th>Imagen</th>\n
            <th>Precio/Unidad</th>\n
            <th>Cantidad</th>\n
            <th>Precio</th>\n
            <th>Modificar</th>\n
            <th>Eliminar</th>\n
           

        </tr>\n";



        foreach($array_compra as $item)
        {
            foreach($item as $clave => $valor)
            {
                for($i=1; $i<=$n_filas; $i++)
                {
                    $fila = mysqli_fetch_array($res);
                   

                    if($clave==$fila['id_producto'])
                    {
                        $imagen ='data:image/' . ';base64,' . base64_encode($fila['imagen']);

                        echo "<tr>\n";
                       // echo"<form action='modificar_carro.php' method='post'>";
                        echo "  <td>".$fila['nombre']."</td>\n";
                        echo "  <td> <img width='70' height='70' src='$imagen'></img></td>\n";
                        echo "  <td>".$fila['precio']."€</td>\n";

                        
                       // echo "  <td><input width='50px' height='20px' type='text' name='cantidad' value='$valor'></td>\n";
                       echo "  <td>".$valor."</td>\n";
                        echo "  <td>".$fila['precio']*$valor."€</td>\n";
                        $suma_total+=$fila['precio']*$valor;
                        echo" <td><input width='20px' height='20px' type='image' src='ico_modificar.png ' ></td>";

                        echo "  <td><a href=eliminar.php?id=".$fila['id_producto']."><img width='20px' height='20px' src=ico_eliminar.jpg alt='Eliminar' border=0></a>";
                     
                        echo "</tr>\n";
                        break;
                        
                        
                    }
                }

            }

        }
       
    
    
        echo "<tr><td colspan=10><hr></td></tr> ";
        echo"<td></td>\n";
        echo"<td></td>\n";
        echo"<td></td>\n";
        echo"<td>Total:</td>\n";
        echo "<td>".$suma_total."€</td>\n";
        echo"<td></td>\n";
        echo"<td></td>\n";
        echo "<tr><td colspan=10><hr></td></tr> ";
      
        echo "</table>";
        echo "<center><a href='finalizar_pedido.php'>Comprar</a></center>";
    }
    else{
      echo'<script type="text/javascript">
      alert("Logueate criatura");
      window.location.href="productos.php";
      </script>';
       
    }
?>
 <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"></script>
   
</body>
</html>