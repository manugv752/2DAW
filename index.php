
 <?php 
   
    
   session_start();

           echo "COMPROBAR LOS VALORES<br />";
            echo "=======================<p />";
            print_r( $_SESSION );
            echo "<p />";
            echo "Identificador de la sesión: [".session_id()."]<br/>";
            echo "Nombre de la sesión: [".session_name()."]<p/>";
           
            echo "<p/>";
   

        if($_SESSION['rol']=="admin")
        {
            echo "<h1> Configuración administrador </h1>";
            echo "<a href='administrar_usuarios.php' > Administracion Base Datos </a><br>";
            echo "<a href='administrar_productos.php' > Administrar Productos </a><br>";
            echo "<a href='productos.php' > Pagina Principal </a><br>";
        
          
            

           
        }else{
            header("Location: productos.php");
        }

?>

