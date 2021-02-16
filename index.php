
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
            echo "<a href='administrar_usuarios.php' > Administracion Base Datos </a>";
            echo "<a href='inicio.html' > Inicio Pagina </a>";
          
            

           
        }else{
            header("Location: inicio.html");
        }

?>

