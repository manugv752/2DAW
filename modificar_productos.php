

<?php
session_start();
	error_reporting(0);
   // me conecto a la BD
   include ('conexion.php');

   // Obtengo las variables
     $id = $_REQUEST["id"];
    $conexion=conectar();
    $consulta = "SELECT * FROM productos WHERE id_producto='".$id."';";
    $res=mysqli_query($conexion,$consulta) or die("consulta incorrecta");
    $fila = mysqli_fetch_array($res);
?>


<HTML>
  <HEAD>
   <TITLE>Modificacion Productos</TITLE>
   <link rel="stylesheet" href="css/tabla_vertical.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  </HEAD>
  <BODY>
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
  
      
<div class="container-table">
  <form method="get" action="modificar_guardar_productos.php">
  
  <table >
  <th colspan="2">Modificar  <?php echo $fila['nombre']?></th>
	  <tr>
		<td><div>Id_producto</div></td>
		<td><input name="id_producto" type="text" readonly  value="<?php echo $fila['id_producto'];?>"> </td>
	  </tr>
	  <tr>
		<td><div>Nombre</div></td>
		<td><input name="nombre" type="text" value="<?php echo $fila['nombre'];?>"> </td>

	  </tr>
	  <tr>
		<td><div>Precio</div></td>
		<td><input name="precio" type="text" value="<?php echo $fila['precio'];?>"> </td>
	  </tr>
	  <tr>
		<td><div>Stock</div></td>
		<td><input name="stock" type="text" value="<?php echo $fila['stock'];?>"> </td>
		</td>
	  </tr>
	  <tr>
		<td><div>Descripcion</div></td>
		<td><input name="descripcion" type="textarea" value="<?php echo $fila['descripcion'];?>"> </td>
	  </tr>
	  <tr>
		<td><div>Id_categoria</div></td>
		<td><input name="id_categoria_productos" type="text" value="<?php echo $fila['id_categoria_productos'];?>"> </td>
	  </tr>
      <tr></tr>
	  <tr>
        
		<td colspan=2 >
            <div align="center">
		    <input type="submit" name="Submit" value="Guardar" />
		  </div>
             </td>
	  </tr>
	</table>
  </form>
</div>
</BODY>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"></script>