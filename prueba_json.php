<?php
session_start();
include "conexion.php";



$con = conectar();

//mysqli_set_charset($con, "utf8");

if($con){
	$sql = "select * from productos";
	$query = $con->query($sql);
	
	while($r = $query->fetch_assoc()){
		$data[] = array_push($r);
	}

    print_r($data);
    echo json_last_error_msg ();
	echo json_encode(array("productos"=>$data));
    $file = 'productos.json';
    file_put_contents($file, json_encode(array("productos"=>$data)));
}
?>

