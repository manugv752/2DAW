<?php

include 'conexion.php';
 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "tienda";
 $tbl_name = "usuarios";
 
 $conexion = conectar();

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE nombre = '$_POST[nombre]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "El nombre de Usuario ya a sido tomado." . "<br />";

 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
 }
 else{

 $form_pass = $_POST['contraseña'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT);

 $query = "INSERT INTO usuarios (nombre, email ,direccion, contraseña)
           VALUES ('$_POST[nombre]','$_POST[email]','$_POST[direccion]','$hash')";

 if ($conexion->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['nombre'] . "</h4>" . "\n\n";
 echo "<h5>" . "Hacer Login: " . "<a href='login.html'>Login</a>" . "</h5>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);

?>